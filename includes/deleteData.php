<?php
require_once "./includes/config/dbConnection.php";
if (isset($_GET['delete']) && $_GET['delete']) {
    $id = $_GET['id'];
    try {
        $sql = "DELETE from users WHERE id = :id";
        $qurey = $pdo->prepare($sql);
        $qurey->bindParam(":id", $id);
        $qurey->execute();
        $rowCount = $qurey->rowCount();
        if (!$rowCount) {
            echo "<script>alert('something went wrong')</script>";
        }
        $qurey = null;
        $pdo = null;
        header("Location:./success.php");
    } catch (PDOException $e) {
        die("ERROR: error while deleting the record " . $e->getMessage());
    }
}
?>