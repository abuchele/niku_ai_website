<?php

// Check if the form has been submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Get the form data
  $name = $_POST['name'];
  $email = $_POST['email'];
  $message = $_POST['message'];

  // Validate the form data
  if (empty($name) || empty($email) || empty($message)) {
    echo 'Please fill in all the fields.';
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo 'Please enter a valid email address.';
  } else {
    // Set up the email message
    $to = 'acbuchele@gmail.com';
    $subject = 'New message from your website';
    $body = "Name: $name\nEmail: $email\n\n$message";
    $headers = "From: $name <$email>";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
      echo 'Your message has been sent!';
    } else {
      echo 'Sorry, there was an error sending your message.';
    }
  }

} else {
  // Redirect to the contact page if the form hasn't been submitted
  header('Location: contact.html');
  exit;
}

?>
