<?php include_once "./header.php"; ?>
<?php
if (isset($_POST['updateData'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    try {
        // connecting to the db
        require_once "./config/dbConnection.php";
        if (empty($name) || empty($email)) {
            echo "<script>alert('provide valid data')</script>";
            sendBack();
        }else{
            $sql = "UPDATE users SET name=:name,email=:email WHERE id = :id";
            $query = $pdo->prepare($sql);
            $query->bindParam(":name",$name);
            $query->bindParam(":email",$email);
            $query->bindParam(":id",$id);
            $query->execute();
            $pdo=null;
            $query = null;
            header("Location:../success.php");
        }

    } catch (PDOException $e) {
        die('ERROR:insertion of data failed '.$e->getMessage());
    }
}
?>
<h1>insert Data file</h1>