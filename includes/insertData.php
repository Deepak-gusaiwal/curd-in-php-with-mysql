<?php include_once "./header.php"; ?>
<?php
if (isset($_POST['insertData'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    try {
        // connecting to the db
        require_once "./config/dbConnection.php";
        if (empty($name) || empty($email)) {
            echo "<script>alert('provide valid data')</script>";
            sendBack();
        }else{
            $sql = "INSERT INTO users(name,email) VALUES (:name,:email)";
            $query = $pdo->prepare($sql);
            $query->bindParam(":name",$name);
            $query->bindParam(":email",$email);
            $query->execute();
            $pdo=null;
            $query = null;
            header("Location:../success.php");
            exit();
        }

    } catch (PDOException $e) {
        die('ERROR:insertion of data failed '.$e->getMessage());
    }
}
?>
<h1>insert Data file</h1>