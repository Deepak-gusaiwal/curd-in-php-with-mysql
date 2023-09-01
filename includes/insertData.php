<?php include_once "./header.php"; ?>
<?php
if (isset($_POST['insertData'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    try {
        // connecting to the db
        require_once "./config/dbConnection.php";
        if (empty($name) || empty($email)) {
            echo "<script>alert('provide valid data')</script>";
            sendBack();
        } else {
            //hashing the password
            $option = [
                "cost" => 12
            ];
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $option);
            $sql = "INSERT INTO users(name,email,password) VALUES (:name,:email,:password)";
            $query = $pdo->prepare($sql);
            $query->bindParam(":name", $name);
            $query->bindParam(":email", $email);
            $query->bindParam(":password", $hashedPassword);
            $query->execute();
            $pdo = null;
            $query = null;
            header("Location:../success.php");
            exit();
        }

    } catch (PDOException $e) {
        die('ERROR:insertion of data failed ' . $e->getMessage());
    }
}
?>
<h1>insert Data file</h1>