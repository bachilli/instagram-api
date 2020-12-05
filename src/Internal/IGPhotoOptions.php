<?php

namespace InstagramFollowers\Internal;

use InstagramFollowers\Traits\GenerateUUIDV4Trait;

class IGPhotoOptions {
    use GenerateUUIDV4Trait;
    const MEDIA_TYPE_IMAGE = "1";

    public function getFbUploaderUploadSessionId($upload_id, $r_upload_param = 0) {
        $randTmpFileStr = rand(3000000000000, 4000000000000);
        $tmpFilePath = '/data/data/com.instagram.android/files/pending_media_images/pending_media_.' . $randTmpFileStr . 'jpg,';
        $tmpFileStringHashCode = $this->hashCode($tmpFilePath);
        $formatStr = '%s_%s_%s';
        return sprintf($formatStr, $upload_id, $r_upload_param, $tmpFileStringHashCode);
    }

    public function generate_image_upload_headers($upload_id, $upload_session_id, $EntityLength) {
        return [
            "X_FB_PHOTO_WATERFALL_ID" => $this->generateUUID(true),
            "X-Entity-Type" => "image/jpeg",
            "X-Entity-Name" => $upload_session_id,
            "Offset" => "0",
            "X-Entity-Length"=> $EntityLength,
            "X-Instagram-Rupload-Params" => $this->X_IG_RUPLOAD_PARAMS($upload_id),
        ];

    }

    protected function X_IG_RUPLOAD_PARAMS($upload_id) {
        $retryContext = [
            "num_step_auto_retry" => 0,
            "num_reupload" => 0,
            "num_step_manual_retry" => 0
        ];
        $image_comp = [
            "lib_name" => "moz",
            "lib_version" => "3.1.m",
            "quality" => "89",
            "ssim" => 0.9966439604759216
        ];

        $data = [
            "retry_context" => json_encode($retryContext),
            "media_type" => self::MEDIA_TYPE_IMAGE,
            "upload_id" => $upload_id,
            "xsharing_user_ids" => "[]",
            "image_compression" => json_encode($image_comp),
            "original_photo_pdq_hash" => ""//todo add PDQ Hashing algorithm
        ];
        return json_encode($data);
    }

    protected function hashCode($str) {
        $h = 0;
        if ($h == 0 && strlen($str) > 0) {
            $val = $str;
            for ($i = 0; $i < strlen($val); $i++) {
                $hash = 31 * $h + ord($val[$i]);
                $ch = $hash % 4294967296;
                if ($ch > 2147483647) {
                    $h = $ch - 4294967296;
                } else {
                    if ($ch < -2147483648) {
                        $h = $ch + 4294967296;
                    } else {
                        $h = $ch;
                    }
                }
            }

        }
        return $h;
    }
}
