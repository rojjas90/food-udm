<?php
// Get the form fields, removes html tags and whitespace
$name = strip_tags(trim($_POST["name"]));
$name = str_replace(array("\r","\n"),array(" ",""),$name);
$email = filter_var(trim($_POST["email"]),FILTER_SANITIZE_EMAIL);
$message = trim($_POST["message"]);

// check the data
if (empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
  // header('Location: http://www.webdesigncourse.co/omnifood/index.php?success=-1#form');
  header('Location: http://localhost:8023/omnifood-udm/index.php?success=-1#form');
  // echo "entra if";
  exit;
}

// Set the recipient email addres. Update this to YOUR desired email address
// $recipient = "grojas@dwsoftware.mx";
$recipient = "sajor90@gmail.com";

// Set the email subject
$subject = "New contact from $name";

// Build the email content
$email_content = "Name: $name\n";
$email_content .= "Email: $email\n";
$email_content .= "Message $message\n";

// Build the email headers
$email_headers = "From $name <$email>";

// Send the email
mail($recipient, $subject, $email_content, $email_headers);

// Redirect to the index.html page with success code
// header("Location: http://www.webdesigncourse.co/omnifood/index.php?success=1#form");
header("Location: http://localhost:8023/omnifood-udm/index.php?success=1#form");
