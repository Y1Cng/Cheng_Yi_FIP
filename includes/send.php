<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require_once("connect.php");

    if($_SERVER["REQUEST_METHOD"] === "POST") {

        $name_raw = $_POST["name"] ?? "";
        $phone_raw = $_POST["phone"] ?? "";
        $email_raw = $_POST["email"] ?? "";
        $msg_raw = $_POST["message"] ?? "";

        $name = trim(strip_tags($name_raw));
        $phone = trim(strip_tags($phone_raw));
        $email = filter_var(trim($email_raw), FILTER_SANITIZE_EMAIL);
        $message = trim(strip_tags($msg_raw));
        $date = date("Y-m-d H:i:s");

        $errors = [];
        if (empty($name)) { $errors[] = "Name is required."; }
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) { $errors[] = "Valid email is required."; }
        if (empty($message)) { $errors[] = "Message is required."; }

        if (!empty($errors)) {
            $error_msg = urlencode(implode(" ", $errors));
            header("Location: ../contact.php?msg=$error_msg");
            exit;
        }

        $sql = "INSERT INTO message (name, email, created, message, phone) VALUES ('$name', '$email', '$date', '$message', '$phone')";
        mysqli_query($connect, $sql);

        $to = "yi@example.com"; 
        $subject = "New Inquiry from Portfolio";
        
        $emailBody = "You received a new inquiry:\r\n\r\n";
        $emailBody .= "Name: {$name}\r\n";
        $emailBody .= "Email: {$email}\r\n";
        $emailBody .= "Phone: {$phone}\r\n\r\n";
        $emailBody .= "Message:\r\n{$message}\r\n";

        $headers = "From: Portfolio <no-reply@yicheng.com>\r\n";
        $headers .= "Reply-To: {$email}\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();

        $sent = mail($to, $subject, $emailBody, $headers);

        if ($sent) {
            header("Location: ../thanks.php");
            exit();
        } else {
            $msg = urlencode("Thank you, $name. Your message has been recorded.");
            header("Location: ../contact.php?msg=$msg");
            exit();
        }

    } else {
        header("Location: ../contact.php");
        exit();
    }
?>
