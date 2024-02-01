<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    define('API_ENDPOINT', 'https://login.xecurify.com/moas/api/auth/challenge');

    function myFunction(string $param = 'default_value') {
        // Your code here
    }

  function EMAIL_ADDRESS_TO_SEND_OTP_TO() {
        // You can return a default email address or implement a logic to determine the email address
        return 'default_email@example.com';
    }

    $data = [
        "customerKey" => "YOUR_CUSTOMER_KEY",
        "phone" => "PHONE_NUMBER_TO_SEND_OTP_TO",
        "email" => EMAIL_ADDRESS_TO_SEND_OTP_TO(), // Call the function here
        "authType" => "SMS",
        "transactionName" => "CUSTOM-OTP-VERIFICATION",
    ];

    $options = [
        'http' => [
            'header' => "Content-type: application/x-www-form-urlencoded\r\n",
            'method' => 'POST',
            'content' => http_build_query($data),
        ],
    ];

    $context  = stream_context_create($options);
    $result = file_get_contents(API_ENDPOINT, false, $context);

    if ($result === FALSE) {
        /* Handle error*/
        echo "Error: " . print_r(error_get_last(), true);
    } else {
        $responseData = json_decode($result, true);

        if ($responseData === null) {
            // Handle invalid JSON data
            echo "Error: Invalid JSON data";
        } else {
            // Display the response data for debugging purposes
            echo "<pre>" . print_r($responseData, true) . "</pre>";
        }
    }
    ?>
</body>
</html>
