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