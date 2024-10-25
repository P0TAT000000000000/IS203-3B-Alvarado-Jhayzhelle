<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'twilio-php-main\src\Twilio\autoload.php';

    $sid = "AC4f7c663969751c0014a6c24fc1bd4239"; // Your Account SID
    $token = "2e4ec1b4168235bb319d87fafacfb8e9"; // Your Auth Token
    $client = new Twilio\Rest\Client($sid, $token);

    $to = $_POST['to'];
    $message = $_POST['message'];

    try {
        $client->messages->create(
            $to, // Recipient's phone number
            [
                'from' => '+13203143372', // Twilio phone number
                'body' => $message
            ]
        );
        echo json_encode(["status" => "success"]);
    } catch (Exception $e) {
        echo json_encode(["status" => "error", "message" => $e->getMessage()]);
    }
}
?>
