<?php

require_once "../vendor/autoload.php";

$instagram = new \InstagramFollowers\Instagram();
$instagram->login("username", "password");

//fetching suggestions for best friends
$instagram->people->get_bestie_suggestions();

//fetch the first user for adding
$firstUser_pk = $instagram->people->get_bestie_suggestions_response->getUsers()[0]->getPk();
echo "Adding user_id: ", $firstUser_pk, ", to best friends\n";
//adding one user to best friends
$instagram->people->add_best_friend($firstUser_pk);

//fetching two users for adding
$secondUser_pk = $instagram->people->get_bestie_suggestions_response->getUsers()[1]->getPk();
$thirdUser_pk = $instagram->people->get_bestie_suggestions_response->getUsers()[2]->getPk();
echo "Adding user_ids: ", $secondUser_pk . ", " . $thirdUser_pk, ", to best friends\n";

//adding two or more users to best friends
$instagram->people->add_best_friend([$secondUser_pk, $thirdUser_pk]);

$instagram->people->get_besties();

echo "Best friends: \n====\n";
foreach ($instagram->people->get_besties_response->getUsers() as $user) {
    echo "username: ", $user->getUsername(), "\nuser_id: ", $user->getPk(), "\n";
}
echo "====\n";


//Here is how to delete Besties
//$instagram->people->delete_best_friend($firstUser_pk);
//$instagram->people->delete_best_friend([$secondUser_pk, $thirdUser_pk]);

//$instagram->people->delete_best_friend_Response;