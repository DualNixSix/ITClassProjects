<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $comments = $_POST['comments'];

    // Business Email
    $businessMessage = "Feedback from $firstName $lastName ($email)\n\nComments:\n$comments";
    mail("business@example.com", "New Feedback", $businessMessage);

    // User Email
    $userMessage = "Thank you, $firstName, for your feedback!\n\nYou submitted the following:\n$comments";
    mail($email, "Your Feedback Confirmation", $userMessage);

    // Store feedback on server
    $feedbackFile = "feedback_" . time() . ".txt";
    file_put_contents($feedbackFile, $businessMessage);

    // Return confirmation to
