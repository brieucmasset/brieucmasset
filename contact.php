<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';

// Include PHPMailer autoload file
require 'vendor/autoload.php';

// Vos paramètres SMTP pour Gmail
$smtpHost = 'smtp.gmail.com';
$smtpUsername = 'brieuc.masset78@gmail.com'; // Remplacez par votre adresse Gmail
$smtpPassword = 'pkhrcltiybyrxsbm'; // Remplacez par le mot de passe ou le mot de passe d'application

// Récupération des données du formulaire
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

try {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = $smtpHost;
    $mail->SMTPAuth = true;
    $mail->Username = $smtpUsername;
    $mail->Password = $smtpPassword;
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // Expéditeur
    $mail->setFrom($email, $name);

    // Destinataire
    $mail->addAddress('brieuc.masset78@gmail.com'); // Adresse où vous souhaitez recevoir le message

    // Sujet de l'e-mail
    $mail->Subject = 'Nouveau message du formulaire de contact';

    // Contenu de l'e-mail
    $mail->Body = "Nom: $name\n";
    $mail->Body .= "Email: $email\n";
    $mail->Body .= "Message:\n$message";

    $mail->send();
    echo 'Message envoyé avec succès!';
} catch (Exception $e) {
    echo 'Erreur lors de l\'envoi du message: ', $mail->ErrorInfo;
}
