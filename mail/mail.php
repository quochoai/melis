<?php
    include "php-mailer/class.phpmailer.php";
    include "php-mailer/class.smtp.php";
    function send_gmail($to_email, $to_name, $subject, $content, $from_name=''){ // $from_email, $from_email_pass, 
        $mail = new PHPMailer();
        $mail->CharSet = "utf-8";
        $mail->Encoding = 'quoted-printable';
        $mail->IsSMTP(); // set mailer to use SMTP
        $mail->Host = "smtp.googlemail.com"; // specify main and backup server
        $mail->Port = 465; // set the port to use
        $mail->SMTPAuth = true; // turn on SMTP authentication
        $mail->SMTPSecure = 'ssl';
        $mail->Username = "queennature.vn3012@gmail.com"; // your SMTP username or your gmail username
        $mail->Password = "vukieuvi3012"; // your SMTP password or your gmail password
        $mail->From = "queennature.vn3012@gmail.com";
        $mail->FromName = $from_name; // Name to indicate where the email came from when the recepient received
        $mail->AddAddress($to_email,$to_name);
        $mail->AddReplyTo("queennature.vn3012@gmail.com",$from_name);
        $mail->WordWrap = 50; // set word wrap
        $mail->IsHTML(true); // send as HTML
        $mail->Subject = html_entity_decode($subject);
        $mail->Body = html_entity_decode($content); //HTML Body
        return $mail->Send();
    }
