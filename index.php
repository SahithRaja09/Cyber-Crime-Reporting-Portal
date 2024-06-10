<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $dbname = "test";

    $conn = mysqli_connect($server, $username, $password, $dbname);

    if ($conn) {
        if (isset($_POST['name'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $incident_type = $_POST['incident_type'];
            $incident_date = $_POST['incident_date'];
            $location = $_POST['location'];
            $description = $_POST['description'];

            $query = "INSERT INTO `crime_reports` (`Name`, `Email`, `Phone No.`, `Incident Type`, `Incident Date`, `Location`, `Description`, `Complaint Filing Date`) VALUES ('$name', '$email', '$phone', '$incident_type', '$incident_date', '$location', '$description', current_timestamp())";

            $run = mysqli_query($conn, $query);

            if ($run) {
                $last_id = mysqli_insert_id($conn);
                echo "<div class='message success'>The details provided have been successfully recorded! Complaint No.: $last_id</div>";
            } else {
                echo "<div class='message error'>Unable to file your complaint. Please try again later.</div>";
            }
        } else {
            echo "<div class='message error'>All fields are required.</div>";
        }
    } else {
        echo "<div class='message error'>Database connection failed.</div>";
    }
?>
