<?php

require_once 'const/dbconn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        
        $dbConnection = new dbconn();
        $conn = $dbConnection->connect();

        
        $error = array();

        $firstname = $_POST["firstname"];
        $secondname = $_POST["secondname"];
        $email = $_POST["email"];
        $username = $_POST["username"];

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)){

            echo "Invalid email";
        }

        $checkQuery = "SELECT username FROM entries WHERE username = :username";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bindParam(':username', $username);
        $checkStmt->execute();

        if ($checkStmt->rowCount() > 0) {
            $errors[] = "Username already exists!! Please enter a different username";
        }

        if (empty($errors)) {

        $sql = "INSERT INTO entries (firstname, secondname, email, username) VALUES (:firstname, :secondname, :email, :username)";

        
        $stmt = $conn->prepare($sql);

        
        $stmt->bindParam(':firstname', $firstname);
        $stmt->bindParam(':secondname', $secondname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':username', $username);

        
        if ($stmt->execute()) {
            echo "User has been enlisted successfully.";
        } else {
            echo "Error inserting data.";
        }
    } else {
        foreach ($errors as $error){
            echo $error . "<br>";
        }
    }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
