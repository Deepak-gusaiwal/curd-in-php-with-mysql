<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP CURD PRACTICE</title>
    <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">
</head>
<body>
  <?php require "./includes/header.php"; ?>

  <form class="form" action="./includes/insertData.php" method="post">
    <input placeholder="Name" type="text" name="name">
    <input placeholder="Email" type="email" name="email">
    <button name="insertData" type="submit">submit</button>
  </form>

  <?php require_once "./includes/showData.php";  ?>
</body>
</html>