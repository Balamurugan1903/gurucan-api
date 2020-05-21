<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;

$api_url = 'https://{YOURDOMAIN}.gurucan.com/api/';
$api_key = 'API_KEY';

$auth_headers = array('Gc-api-key'=>$api_key);

$user_id = 'USER_ID';
$course_id = 'COURSE_ID';
$tag_id = "TAG_ID";

$client = new Client([
    'base_uri' => $api_url,
    'timeout'  => 2.0,
]);

//Listing users
$usersRequest = $client->request('GET','/api/admin/users',['headers'=>$auth_headers]);
echo "USERS ".$usersRequest->getBody()."\n\n\n";

//Listing courses
$coursesRequest = $client->request('GET','/api/admin/courses',['headers'=>$auth_headers]);
echo "COURSES ".$coursesRequest->getBody()."\n\n\n";

//Granting access to a course for a user that's already created
/*
$coursesRequest = $client->request('POST','/api/admin/users/grant-access',[
    'headers'=>$auth_headers,
    'json' => array(
        'item' => array(
            'refPath'=>"Course",
            '_id'=> $course_id
        ),
        'sendPaymentEmail' => true,
        'email'=>"user@example.com"
        //_id can be also used
    )
]);
echo "ACCESS ".$coursesRequest->getBody()."\n\n\n";
*/

/*
//Create tag
$tagRequest = $client->request('POST','/api/admin/tags',[
    'headers'=>$auth_headers,
    'json'=>array(
        'name' => "My tag",
        'for' => 'user'
    )
]);
echo "TAG CREATED ".$tagRequest->getBody()."\n\n\n";
*/

/*
//Add a tag to a user
//Please note, tags are OVERWRITTEN, not appended
$userTagRequest = $client->request('POST','/api/admin/users/'.$user_id,[
    'headers'=>$auth_headers,
    'json'=>array(
        'tag'=>array($tag_id)
    )
]);
echo "TAG ADDED ".$userTagRequest->getBody()."\n\n\n";
*/

?>