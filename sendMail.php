<?php
$postdata = file_get_contents("php://input");
$request = json_decode($postdata);

 echo "<pre>";
 print_r($request);
 echo "</pre>";

// Configure your Subject Prefix and Recipient here
$subject = 'Wiadomość ze strony AutoPremiumClub';
$emailTo       = 'autopremiumclub@gmail.com';

$errors = array(); // array to hold validation errors
$data   = array(); // array to pass back data

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fname   = stripslashes(trim($request->name));
    $company   = stripslashes(trim($request->company));
    $phone   = stripslashes(trim($request->phone));
    $email   = stripslashes(trim($request->mail));
    $content   = stripslashes(trim($request->content));

    if (empty($fname)) {
        $errors['fname'] = 'Name is required.';
    }

    if (empty($company)) {
        $errors['company'] = 'Company is required.';
    }


    if (empty($phone)) {
        $errors['phone'] = 'Phone is required.';
    }
    



    // if there are any errors in our errors array, return a success boolean or false
    if (!empty($errors)) {
        $data['success'] = false;
        $data['errors']  = $errors;
    } else {
        $subject = "$subject";
        $body    = '
            <strong>Imię: </strong>'.$fname.'<br />
            <strong>Firma: </strong>'.$company.'<br />
            <strong>Telefon: </strong>'.$phone.'<br />
            <strong>Mail: </strong>'.$email.'<br />
            <strong>Treść: </strong>'.$content.'<br />
        ';

        $headers  = "MIME-Version: 1.1" . PHP_EOL;
        $headers .= "Content-type: text/html; charset=utf-8" . PHP_EOL;
        $headers .= "Content-Transfer-Encoding: 8bit" . PHP_EOL;
        $headers .= "Date: " . date('r', $_SERVER['REQUEST_TIME']) . PHP_EOL;
        $headers .= "Message-ID: <" . $_SERVER['REQUEST_TIME'] . md5($_SERVER['REQUEST_TIME']) . '@' . $_SERVER['SERVER_NAME'] . '>' . PHP_EOL;
        $headers .= "From: " . "=?UTF-8?B?".base64_encode($fname)."?=" . "<$email>" . PHP_EOL;
        $headers .= "Return-Path: $emailTo" . PHP_EOL;
        $headers .= "Reply-To: $email" . PHP_EOL;
        $headers .= "X-Mailer: PHP/". phpversion() . PHP_EOL;
        $headers .= "X-Originating-IP: " . $_SERVER['SERVER_ADDR'] . PHP_EOL;

        mail($emailTo, "=?utf-8?B?" . base64_encode($subject) . "?=", $body, $headers);

        $data['success'] = true;
        $data['message'] = 'Congratulations. Your message has been sent successfully';
    }

    // return all our data to an AJAX call
    echo json_encode($data);
}
?>