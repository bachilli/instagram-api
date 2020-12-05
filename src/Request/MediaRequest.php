<?php

namespace InstagramFollowers\Request;


use InstagramFollowers\Constants\InstagramConstants;
use InstagramFollowers\Internal\IGPhotoOptions;
use InstagramFollowers\Response;
use InstagramFollowers\Response\ConfigureMediaResponse;
use InstagramFollowers\Response\GetLikersResponse;
use InstagramFollowers\Response\UploadImageResponse;
use InstagramFollowers\Traits\ClientTrait;
use InstagramFollowers\Traits\GenerateUUIDV4Trait;
use InstagramFollowers\Traits\SignDataTrait;
use InstagramFollowers\Utils\CreateImageOutput;

class MediaRequest {
    use ClientTrait;
    use SignDataTrait;
    use GenerateUUIDV4Trait;

    /**
     * @var $blocked_response Response|null
     */
    public $blocked_response;

    /**
     * @var $getLikers_response GetLikersResponse|Response|null
     */
    public $getLikers_response;

    /**
     * @return bool|Response
     */
    public function blocked() {
        $this->blocked_response = $this->client->request("/media/blocked/", Response::class)
            ->needAuthorization(true)
            ->get();
        return $this->blocked_response;
    }

    /**
     * @var $media_id int
     *
     * @return bool|Response|GetLikersResponse
     */
    public function getLikers($media_id) {
        $this->getLikers_response = $this->client->request("/media/$media_id/likers/", GetLikersResponse::class)
            ->needAuthorization(true)
            ->get();
        return $this->getLikers_response;
    }

    /**
     * @var $upload_image_resumable_response UploadImageResponse
     */
    public $upload_image_resumable_response;

    /**
     * Performs a resumable upload of a photo file, with support for retries.
     *
     * @param $image_path $string
     *
     * @throws \Exception
     *
     * @return bool|Response|UploadImageResponse|null
     */
    public function upload_image_resumable($image_path) {
        //preparing data for upload
        $upload_id = $this->getClient()->getNanoTime()->elapsedAddMinutes(rand(10, 30));
        $IG = new IGPhotoOptions();
        $upload_session_id = $IG->getFbUploaderUploadSessionId($upload_id);
        $image_output = CreateImageOutput::createImageOutput($image_path);
        $photo_bytes = $image_output->checkAndReturn();
        $headersExtra = $IG->generate_image_upload_headers($upload_id, $upload_session_id, strlen($photo_bytes));

        //inject headers
        foreach ($headersExtra as $headerName => $headerValue) {
            $this->getClient()->getXHeaders()->addHeader($headerName, $headerValue);
        }

        //the request
        $this->upload_image_resumable_response = $this->client->request("/rupload_igphoto/$upload_session_id/", UploadImageResponse::class, true)
            ->needAuthorization(true)
            ->addMultibyteBody($photo_bytes)
            ->post();

        //delete injected headers
        foreach ($headersExtra as $headerName => $headerValue) {
            $this->getClient()->getXHeaders()->deleteHeader($headerName);
        }

        return $this->upload_image_resumable_response;

    }

    /**
     * @var $uploadPhotoResponse UploadImageResponse
     */
    public $uploadPhotoResponse;
    /**
     * Performs a resumable upload of a photo file, with support for retries.
     *
     * @param $image_path $string
     * @param $caption $string
     *
     * @throws \Exception
     *
     * @return bool|Response|UploadImageResponse|null
     */
    public function UploadPhoto($image_path, $caption) {
        //preparing data for upload
        $upload_id = $this->getClient()->getNanoTime()->elapsedAddMinutes(rand(10, 30));
        $IG = new IGPhotoOptions();
        $upload_session_id = $IG->getFbUploaderUploadSessionId($upload_id);
        $image_output = CreateImageOutput::createImageOutput($image_path);
        $photo_bytes = $image_output->checkAndReturn();
        $headersExtra = $IG->generate_image_upload_headers($upload_id, $upload_session_id, strlen($photo_bytes));

        //inject headers
        foreach ($headersExtra as $headerName => $headerValue) {
            $this->getClient()->getXHeaders()->addHeader($headerName, $headerValue);
        }

        //the request
        $this->uploadPhotoResponse = $this->client->request("/rupload_igphoto/$upload_session_id/", UploadImageResponse::class, true)
            ->needAuthorization(true)
            ->addMultibyteBody($photo_bytes)
            ->post();

        //delete injected headers
        foreach ($headersExtra as $headerName => $headerValue) {
            $this->getClient()->getXHeaders()->deleteHeader($headerName);
        }

        //configure and publish image
        if ($this->uploadPhotoResponse->getStatus() =="ok") {
            $this->configureSinglePhoto($caption, $upload_id, $image_output->getSquareResolutionStandard()[0], $image_output->getSquareResolutionStandard()[1], 0);
        } else {
            throw new \Exception($this->uploadPhotoResponse->getMessage());
        }
        return $this->uploadPhotoResponse;
    }


    /**
     * @var $configureSinglePhoto Response|ConfigureMediaResponse|null
     */
    public $configureSinglePhotoResponse = null;

    /**
     * @param $caption string
     * @param $upload_id int
     * @param $source_width int
     * @param $source_height int
     * @param $crop_zoom float
     * @param string $timezone_offset string
     *
     * @return Response|ConfigureMediaResponse|bool
     */
    public function configureSinglePhoto($caption, $upload_id, $source_width, $source_height, $crop_zoom, $timezone_offset = "-21600") {
        $osData = $this->getClient()->getDevice()->getOsVersion();
        $osVer_Rel = explode("/", $osData);
        $data = [
            "timezone_offset" => $timezone_offset,
            "_csrftoken" => $this->getClient()->get_csrt_token(),
            "media_folder" => "Camera",
            "source_type" => "4",
            "_uid" => $this->getClient()->get_cookie_from_name("ds_user_id"),
            "device_id" => $this->getClient()->getAndroidId(),
            "_uuid" => $this->getClient()->getDeviceId(),
            "creation_logger_session_id" => $this->generateUUID(),
            "caption" => $caption,
            "upload_id" => $upload_id,
            "device" => [
                "manufacturer" => $this->getClient()->getDevice()->manufacturer,
                "model" => $this->getClient()->getDevice()->getModel(),
                "android_version" => $osVer_Rel[0],
                "android_release" => $osVer_Rel[1]
            ],
            "edits" => [
                "crop_original_size" => [
                    $source_width,
                    $source_height
                ],
                "crop_center" => [
                    0,
                    0
                ],
                "crop_zoom" => $crop_zoom
            ],
            "extra" => [
                "source_width" => $source_width,
                "source_height" => $source_height
            ]
        ];

        $dataStr = json_encode($data);
        $this->configureSinglePhotoResponse = $this->client->request("/media/configure/", ConfigureMediaResponse::class)
            ->needAuthorization(true)
            ->addParam("signed_body", $this->generateSigned_body($dataStr))
            ->addParam("ig_sig_key_version", InstagramConstants::IG_SIG_KEY_VERSION)
            ->post();
        return $this->configureSinglePhotoResponse;
    }


}
