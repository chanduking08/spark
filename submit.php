<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $story = $_POST['yourStory'];
    $servername = "localhost";
    $username = "root";
    $password = "root@fuint";
    $dbname = "spark";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO Persons (FirstName, Lastname, email, story) VALUES ('$firstName', '$lastName', '$email', '$story')";

    if ($conn->query($sql) === TRUE) {
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

  $conn->close();
  ?>
  <p class="text-white">Thanks for submitting. You will receive a welcome email shortly!</p>

  <?php
  // Start with PHPMailer class
  use PHPMailer\PHPMailer\PHPMailer;
  require_once './vendor/autoload.php';
  // create a new object
  $mail = new PHPMailer();
  // configure an SMTP
  $mail->isSMTP();
  $mail->Host = 'smtp.mailtrap.io';
  $mail->SMTPAuth = true;
  $mail->Username = '6491518d1794f4';
  $mail->Password = '1695a43d906eed';
  $mail->SMTPSecure = 'tls';
  $mail->Port = 2525;

  $mail->setFrom('thangaraj120.com@gmail.com', 'Your Pledge');
  $mail->addAddress($email, 'Me');
  $mail->Subject = 'Thanks for Pledge with us!';
  // Set HTML
  $mail->isHTML(TRUE);
  $mail->Body = '<html>Hi there, we are happy to <br>confirm your pledge.</html>';
  $mail->AltBody = 'Hi there, we are happy to confirm your pledge.';
  // send the message
  $mail->send();
  if(!$mail->send()){
      echo 'Message could not be sent.';
      echo 'Mailer Error: ' . $mail->ErrorInfo;
  }

?>