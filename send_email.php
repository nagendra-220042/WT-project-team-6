<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';

function sendAppointmentEmail($email, $name, $doctor, $date, $time) {

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;

        $mail->Username = 'lavanyayadavmakke34@gmail.com';
        $mail->Password = 'rkcuyzinzwfsgmav'; // no spaces

        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;

        $mail->setFrom('lavanyayadavmakke34@gmail.com', 'Sanjeevani Hospital');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = 'Appointment Confirmation';

        $mail->Body = "
        <h3>Appointment Confirmed ✅</h3>
        <p>Name: $name</p>
        <p>Doctor: $doctor</p>
        <p>Date: $date</p>
        <p>Time: $time</p>
        ";

        $mail->send();
        return true;

    } catch (Exception $e) {
         echo "Mailer Error: " . $mail->ErrorInfo;
         
         }
}
?>
