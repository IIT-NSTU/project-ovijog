<?php
use PHPMailer\PHPMailer\PHPMailer;
session_start();

function flash($name = '', $message = '', $class = 'alert alert-success') {
    if (!empty($name)) {

        if (!empty($message) && empty($_SESSION[$name])) {

            $_SESSION[$name] = $message;
            $_SESSION[$name . '_class'] = $class;

        } elseif (empty($message) && !empty($_SESSION[$name])) {
            $class = !empty($_SESSION[$name . '_class']) ? $_SESSION[$name . '_class'] : '';
            echo '<div class="' . $class . '" id="msg-flash">' . $_SESSION[$name] . '</div>';

            unset($_SESSION[$name]);
            unset($_SESSION[$name . '_class']);
        }
    }
}

function isLoggedIn() {
    if (isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}

function sendMail($edu_mail, $link){

// Create an instance; Pass `true` to enable exceptions
    $mail = new PHPMailer;

// Server settings
//$mail->SMTPDebug = SMTP::DEBUG_SERVER;    //Enable verbose debug output
    $mail->isSMTP();                            // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';           // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                     // Enable SMTP authentication
    $mail->Username = 'projectovijog@gmail.com';       // SMTP username
    $mail->Password = 'augcviqwmbjosmmi';         // SMTP password
    $mail->SMTPSecure = 'ssl';                  // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 465;                          // TCP port to connect to

// Sender info
    $mail->setFrom('projectovijog@gmail.com', 'Project Ovijog');
//$mail->addReplyTo('reply@gmail.com', 'Arnab');

// Add a recipient
    $mail->addAddress($edu_mail);

//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

// Set email format to HTML
    $mail->isHTML(true);

// Mail subject
    $mail->Subject = 'Verify your Project Ovijog account';

// Mail body content
    $bodyContent = '<h1>To verify your <a href="http://localhost/ovijog">Project Ovijog</a> account please click on the below link:</h1>';
    $bodyContent .= '<a href='.$link.'>Click Here</a>';
    $bodyContent .='<h3>If you do not send a request please ignore this email.</h3>';
    $bodyContent .='<h3>Thank you</h3>';
    $mail->Body    = $bodyContent;

// Send email
    if(!$mail->send()) {
        echo 'Message could not be sent. Mailer Error: '.$mail->ErrorInfo;
    }
}


