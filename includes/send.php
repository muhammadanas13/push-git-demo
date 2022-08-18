<?php


    require 'PHPMailer.php';

if($_POST) {



    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);


    if (empty($name)) {
        $empty[] = "<b>Name</b>";
    }
    if (empty($email)) {
        $empty[] = "<b>Email</b>";
    }

    if (empty($message)) {
        $empty[] = "<b>Message</b>";
    }

    if (!empty($empty)) {
        $output = json_encode(array('type' => 'error', 'text' => implode(", ", $empty) . ' Required!'));
        die($output);
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //email validation
        $output = json_encode(array('type' => 'error', 'text' => '<div class="alert alert-warning alert-dismissible fade show mt-2 mb-2" role="alert">'.'<b>' . $email . '</b> is an invalid Email, please correct it.</div>'));
        die($output);
    }




    if (isset($_POST["captcha"])) {
        $captcha = $_POST["captcha"];
        $privatekey = "6LfpktMZAAAAAHZJKundUr5REBxQsfUqABcXRhuM"; //Please Enter your Secret Key
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => $privatekey,
            'response' => $captcha,
            'remoteip' => $_SERVER['REMOTE_ADDR']
        );

        $curlConfig = array(
            CURLOPT_URL => $url,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $data
        );

        $ch = curl_init();
        curl_setopt_array($ch, $curlConfig);
        $response = curl_exec($ch);
        curl_close($ch);
    }

    $jsonResponse = json_decode($response);
    if ($jsonResponse->success==false) {
        // What happens when the CAPTCHA was entered incorrectly
        $output = json_encode(array('type' => 'error', 'text' => '<div class="alert alert-warning alert-dismissible fade show mt-2 mb-2" role="alert">'.'<b>Captcha</b> Validation Required!</div>'));
        die($output);
    } else {
            /**
             * Send mail to server
             */
            $mail = new PHPMailer;
            $mail->setFrom('contact@y2img.xyz', 'Contact'); // Enter Your site Email 
            $mail->addReplyTo('contact@y2img.xyz', 'Contact'); // Enter your email here too
            $mail->addAddress('anas.annsu@gmail.com'); // Enter your gmail/yahoo email or where you want recieve email

            $mail->Body = "Name: $name \n\r";
            $mail->Body .= "Email: $email \n\r";

            $mail->Body .= "Message: $message \n\r";

            if (!$mail->send()) {
                $output = json_encode(array('type' => 'error', 'text' => '<div class="alert alert-info alert-dismissible fade show mt-2 mb-2" role="alert">Unable to send email, please contact contact@y2img.xyz</div>'));
                die($output);
            } else {
                /**
                 * Send mail to client
                 */

                $output = json_encode(array('type' => 'message', 'text' => '<div class="alert alert-success alert-dismissible fade show mt-2 mb-2" role="alert">'.'Hi ' . $name . ', thank you for the message. We will get back to you shortly.</div>'));
                die($output);
            }


    }


}


?>



