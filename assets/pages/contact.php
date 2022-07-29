<?php
  // error message sent if empty (i think this is just to instantiate the variable)
  $errors = '';
  // set email you want to use
  $myemail = '';


  if(isset( $_POST['name']))
  $name = $_POST['name'];
  if(isset( $_POST['email']))
  $email = $_POST['email'];
  if(isset( $_POST['message']))
  $message = $_POST['message'];
  if(isset( $_POST['subject']))
  $subject = $_POST['subject'];
  if ($name === '') {
    echo "Name cannot be empty.";
    die();
  if ($email === '') {
    echo "Email cannot be empty.";
    die();
  } else {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo "Email format invalid.";
      die();
    }
  }
  if ($subject === '') {
    echo "Subject cannot be empty.";
    die();
  }
  if ($message === '') {
    echo "Message cannot be empty.";
    die();
  }

  if (!preg_match(
  "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
  $email_address))
  {
    $errors .= "\n Error: Invalid email address";
  }

  if( empty($errors))

  {

  $content="From: $name \n Email: $email \n Message: $message";
  $recipient = "hello@stevenmnoyes.af@gmail.com";
  $mailheader = "From: $email \r\n";
  mail($recipient, $subject, $content, $mailheader) or die("Error!");
  echo "Email sent!";

  header('Location: thankYou.html');

  }
?>
