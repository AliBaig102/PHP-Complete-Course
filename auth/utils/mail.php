<?php
require '../vendor/autoload.php';
require_once '../vendor/phpmailer/phpmailer/src/Exception.php';
require_once '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
require_once '../vendor/phpmailer/phpmailer/src/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use Dotenv\Dotenv;

$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

function sendEmail($to, $subject, $message): bool
{
    $mail = new PHPMailer(true);
    try {
        //Server settings
        $mail->SMTPDebug = 2;
        $mail->isSMTP();
        $mail->Host = $_ENV['EMAIL_HOST'];
        $mail->SMTPAuth = true;
        $mail->Username = $_ENV['EMAIL_HOST_USER'];
        $mail->Password = $_ENV['EMAIL_HOST_PASSWORD'];
        $mail->SMTPSecure = 'tls';
        $mail->Port = $_ENV['EMAIL_PORT'];
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        //Recipients
        $mail->setFrom($_ENV['EMAIL_HOST_USER'], 'Auth');
        $mail->addAddress($to);
        //Content
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }
}

;

function emailTemplate($brandName, $message, $href,$buttonText,$code,$country): string
{
    return '<div style="font-family: Helvetica,Arial,sans-serif;min-width:1000px;overflow:auto;line-height:2">
  <div style="margin:50px auto;width:70%;padding:20px 0">
    <div class="brand" style="border-bottom:1px solid #eee">
      <a href="" style="font-size:1.4em;color: #fff;text-decoration:none;font-weight:600">' . $brandName . '</a>
    </div>
    <p style="font-size:1.1em">Hi,</p>
    <p>' . $message . '</p>
    <h2  style="background:#3498db;color:#fff;text-decoration:none;padding:10px 25px;display:inline-block;border-radius:5px;margin:25px 0">.' . $code . '</h2>
    <a href="' . $href . '" style="background:#3498db;color:#fff;text-decoration:none;padding:10px 25px;display:inline-block;border-radius:5px;margin:25px 0">.' . $buttonText . '</a>
    <p style="font-size:0.9em;">Regards,<br />.' . $brandName . '</p>
    <hr style="border:none;border-top:1px solid #eee" />
    <div style="float:right;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
      <p>' . $brandName . ' Inc</p>
      <p>' . $country . '</p>
    </div>
  </div>
</div>';
};