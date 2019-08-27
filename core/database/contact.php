<?php

if(isset($_POST['submit'])){

    // echo "Connected to file";

    // $to = "d_moftakhar@hotmail.com"; // this is your Email address
    //
    // $from = $_POST['email']; // this is the sender's Email address
    //
    // $name = $_POST['name'];
    //
    // $subject = "Lowtono.co contact form submission";
    //
    // $subject2 = "Copy of your form submission";
    //
    // $message = $name . " wrote the following:" . "\n\n" . $_POST['message'];
    //
    // $message2 = "Here is a copy of your message " . $name . "\n\n" . $_POST['message'];
    //
    // $headers = "From:" . $from;
    //
    // $headers2 = "From:" . $to;
    //
    // mail($to,$subject,$message,$headers);
    //
    // mail($from,$subject2,$message2,$headers2); // sends a copy of the message to the sender

    require 'vendor/autoload.php';


    $from = new SendGrid\Email(null, "david@sellmysnaps.com");
    $subject = "Hello World from the SendGrid PHP Library!";
    $to = new SendGrid\Email(null, "david@sellmysnaps.com");
    $content = new SendGrid\Content("text/plain", "Hello, Email!");
    $mail = new SendGrid\Mail($from, $subject, $to, $content);

    $apiKey = getenv('SENDGRID_API_KEY');
    $sg = new \SendGrid($apiKey);

    $response = $sg->client->mail()->send()->post($mail);
    echo $response->statusCode();
    echo $response->headers();
    echo $response->body();

    $message = "Thank you " . $name . ", we will contact you shortly.";

    header("location:/contact.php?msg=".$message);

    // You can also use header('Location: thank_you.php'); to redirect to another page.

    }
?>
