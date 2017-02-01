<?php

// ADD TWILIO REQURIED LIBRARIES
require_once('twilio/Services/Twilio.php');

// TWILIO CREDENTIALS
$TWILIO_ACCOUNT_SID = 'AC2a4b35b8f980d53867c6fd33c7df4cc7';
$TWILIO_CONFIGURATION_SID = 'VSd5e701a6412571a9b218feabc4a5fbf2';
$TWILIO_API_KEY = 'SK35731a23d1faaabc13695d4f4b95a363';
$TWILIO_API_SECRET = 'VKW8sdoyv9I3mFwucryeIElYewKKmxl5';

// CREATE TWILIO TOKEN
// $id will be the user name used to join the chat
$id = $_GET['id'];

$token = new Services_Twilio_AccessToken(
    $TWILIO_ACCOUNT_SID,
    $TWILIO_API_KEY,
    $TWILIO_API_SECRET,
    3600,
    $id
);

// GRANT ACCESS TO CONVERSTATION
$grant = new Services_Twilio_Auth_ConversationsGrant();
$grant->setConfigurationProfileSid($TWILIO_CONFIGURATION_SID);
$token->addGrant($grant);

// JSON ENCODE RESPONSE
echo json_encode(array(
    'id'    => $id,
    'token' => $token->toJWT(),
));
