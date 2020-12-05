<?php

require_once '../vendor/autoload.php';


$ig = new \InstagramFollowers\Instagram();

try {
    $ig->login("username", "password");

    $ig->mediaRequest->UploadPhoto(__DIR__ . '/blur.JPG', 'Another caption');

    //get response from configure
    $candidates = $ig->mediaRequest->configureSinglePhotoResponse->getMedia()->getImageVersions2()->getCandidates();
    $first_candidate = $candidates[0];

    if ($ig->mediaRequest->uploadPhotoResponse->getStatus() == 'ok'){
        echo "File Uploaded, your upload id is: ", $ig->mediaRequest->uploadPhotoResponse->getUploadId(), "\n";
    }

    //check if we are running this script on windows
    if (strtoupper(substr(PHP_OS, 0, 3)) === 'WIN'){
        $sanitized_post_url = str_replace("&", "^^^&", $first_candidate->getUrl());
        shell_exec("echo $sanitized_post_url | clip");
        echo 'Windows: Your image url has been pre-copied to your clipboard. Go into browser and paste it';
    }else{
        echo "Copy the url and paste it in your browser\n", $first_candidate->getUrl();
    }

} catch (Exception $exception) {
    echo "Error occured. \n", $exception->getMessage();
}
