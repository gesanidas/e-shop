<?php
if($_POST)
{
    $to_Email       = "ar.geor4@gmail.com";
    $subject        = 'Painting Contact Form';

    $user_Name        = $_POST["userName"];
    $user_Email       = $_POST["userEmail"];
    $user_Paint       = $_POST["userPaint"];
    $user_Message     = $_POST["userMessage"];
    
    $headers = 'From: '.$user_Email.'' . "\r\n" .
    'Reply-To: '.$user_Email.'' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
    $sentMail = @mail($to_Email, $subject, 'Ονομα : '.$user_Name ."\r\n".' Email : '.$user_Email."\r\n".' Πίνακας : '.$user_Paint."\r\n".' Μηνυμα :'.$user_Message, $headers);
    
    if(!$sentMail)
    {
        $output = 'Δεν μπορέσαμε να στείλουμε το μήνυμα. Δοκιμάστε ξανά !';
        die($output);
    }else{
        $output = 'Γεια σας, '.$user_Name .'. Ευχαριστουμε που επικοινωνησατε μαζι μας. Θα κοιταξουμε το μηνυμα σας και θα επικοινωνησουμε το συντομοτερο δυνατον.';
        die($output);
    }
}
?>