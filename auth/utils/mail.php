<?php
require_once dirname(__DIR__) . '/constant/constant.php';
require_once dirname(__DIR__) . '/vendor/phpmailer/phpmailer/src/Exception.php';
require_once dirname(__DIR__) . '/vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once dirname(__DIR__) . '/vendor/phpmailer/phpmailer/src/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendEmail($to, $subject, $message): bool
{
    $mail = new PHPMailer(true);
    try {
        global $application_name, $email_host, $email_host_user, $email_host_password, $email_port;
        //Server settings
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = $email_host;
        $mail->SMTPAuth = true;
        $mail->Username = $email_host_user;
        $mail->Password = $email_host_password;
        $mail->SMTPSecure = 'tls';
        $mail->Port = $email_port;
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //Recipients
        $mail->setFrom($email_host_user, $application_name);
        $mail->addAddress($to);
        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        if ($mail->send()) {
            return true;
        } else {
            return false;
        }
    } catch (Exception $e) {
        return false;
    }
}

;

function emailTemplate($brand_name, $application_name, $header_message, $body_message, $verification_code, $verification_link, $button_text): string
{
    return '<section style="font-family: Arial, sans-serif; color: #333; margin: 0; padding: 0; background-color: #f4f4f4;">
    <div style="width: 100%; max-width: 600px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); padding: 20px;">
        <div style="background-color: #222; color: #ffffff; text-align: center; padding: 20px;">
            <h1 style="margin: 0; font-size: 28px; font-weight: bold;">' . $application_name . '</h1>
            <p style="margin: 10px 0 0; font-size: 16px;">' . $header_message . '</p>
        </div>
        <div style="padding: 30px; text-align: center;">
            <p style="font-size: 16px; margin: 0 0 20px;">Hi there,</p>
            <p style="font-size: 16px; margin: 0 0 20px;">' . $body_message . '</p>
            <div style="display: inline-block; padding: 10px 20px; border: 2px solid #222; border-radius: 8px; font-size: 24px; margin-bottom: 20px; background-color: #f9f9f9; color: #222;">
                <strong>' . $verification_code . '</strong>
            </div>
            <br/>
            <a href="' . $verification_link . '" style="display: inline-block; padding: 14px 28px; font-size: 16px; color: #ffffff; background-color: #222; text-decoration: none; border-radius: 8px; border: none; cursor: pointer; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);">' . $button_text . '</a>
        </div>
        <div style="background-color: #f1f1f1; color: #666; text-align: center; padding: 15px; font-size: 14px;">
            <p style="margin: 5px 0 0;">Best regards,</p>
            <p style="margin-top: 5px;">' . $brand_name . '</p>
        </div>
    </div>
</section>';
}

;
