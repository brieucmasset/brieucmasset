<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Inclusion des fichiers de PHPMailer
require './vendor/phpmailer/phpmailer/src/Exception.php';
require './vendor/phpmailer/phpmailer/src/PHPMailer.php';
require './vendor/phpmailer/phpmailer/src/SMTP.php';

// Inclusion du fichier autoload de PHPMailer
require 'vendor/autoload.php';

// Mes paramètres SMTP pour Gmail
$smtpHost = 'smtp.gmail.com';
$smtpUsername = 'brieuc.masset78@gmail.com';
$smtpPassword = 'pkhrcltiybyrxsbm';

// Récupération des données du formulaire
$name = $_POST["name"];
$email = $_POST["email"];
$message = $_POST["message"];

// Création d'une instance de PHPMailer
$mail = new PHPMailer(true);

try {
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;
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
    $mail->addAddress('brieuc.masset78@gmail.com'); // Adresse où je souhaite recevoir le message

    // Sujet de l'e-mail
    $mail->Subject = 'Nouveau message du formulaire de contact';

    // Contenu de l'e-mail
    $mail->Body = "Nom: $name\n";
    $mail->Body .= "Email: $email\n";
    $mail->Body .= "Message:\n$message";

    // Envoi du message
    $mail->send();
    echo 'Message envoyé avec succès!';
} catch (Exception $e) {
    echo 'Erreur lors de l\'envoi du message: ', $mail->ErrorInfo;
}
