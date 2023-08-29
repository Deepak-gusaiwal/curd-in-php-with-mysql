<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE DATA</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
  <?php require "./includes/header.php"; ?>
<?php 
require_once "./includes/config/dbConnection.php";
if(isset($_GET['update']) && $_GET['update']){
   try {
    $id= $_GET['id'];
    $sql = "SELECT id,name,email from users WHERE id = :id";
    $query = $pdo->prepare($sql);
    $query->bindParam(":id",$id,PDO::PARAM_INT);
    $query->execute();
    $record = $query->fetchObject();
    if(!$record){
        echo "<script>alert('something went wrong')</script>";
        sendBack();
    }
   } catch (PDOException $e) {
    die("ERROR:error while fetching the single data ".$e->getMessage());
   }
}else{
    sendBack();
}
?>
  <form class="form" action="./includes/updateData.php" method="post">
    <input value="<?php echo $record->id; ?>" type="hidden" name="id">
    <input value="<?php echo $record->name; ?>" placeholder="Name" type="text" name="name">
    <input value="<?php echo $record->email; ?>" placeholder="Email" type="email" name="email">
    <button name="updateData" type="submit">update</button>
  </form>

</body>
</html>