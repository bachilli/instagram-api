<?php

require_once '../vendor/autoload.php';


$ig = new \InstagramFollowers\Instagram();

try {
    $ig->login("username", "password");

    //first remove the old profile picture
    //you can skip this step if you want
    $ig->accountRequest->remove_profile_picture();

    //here we upload the new image to the server
    $response = $ig->mediaRequest->upload_image_resumable(__DIR__ . '/blur.JPG');

    //here we change the profile picture to the uploaded id
    $ig->accountRequest->change_profile_picture($response->getUploadId());

} catch (Exception $exception) {
    echo "Error occured. \n", $exception->getMessage();
}
