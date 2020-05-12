<?php
require 'vendor/autoload.php';
use GuzzleHttp\Client;

$api_url = 'https://{YOURDOMAIN}.gurucan.com/api/';
$api_key = 'API_KEY';

$auth_headers = array('Gc-api-key'=>$api_key);

$user_id = 'USER_ID';
$course_id = 'COURSE_ID';

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
$coursesRequest = $client->request('POST','/api/admin/users/grant-access',[
    'headers'=>$auth_headers,
    'json' => array(
        'item' => array(
            'refPath'=>"Course",
            '_id'=> "5eac335d325f391979aa5f7f"
        ),
        'sendPaymentEmail' => true,
        'email'=>"user@example.com"
        //_id can be also used
    )
]);
echo "ACCESS ".$coursesRequest->getBody()."\n\n\n";

?>