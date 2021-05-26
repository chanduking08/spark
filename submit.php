<?php
    $firstName = $_POST['firstName'] ."<br />";
    $lastName = $_POST['lastName'] ."<br />";
    $email = $_POST['email'] ."<br />";
    $story = $_POST['yourStory'] ."<br />";
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

    $sql = "INSERT INTO Persons (firstname, lastname, email, story)
    VALUES ($firstName, $lastName, $email, $story)";

    if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }

  $conn->close();
?>
<p class="text-white">Thanks for submitting. You will receive a welcome email shortly!</p>