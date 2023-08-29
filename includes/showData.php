<?php
require_once "./includes/config/dbConnection.php";


$sql = "SELECT id,name,email,DT from users";
try {
    $query = $pdo->prepare($sql);
    $query->execute();
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    $pdo = null;
    $query = null;
} catch (PDOException $e) {
    die("ERROR:error occured while fetching data " . $e->getMessage());
}
?>


<div class="gridContainer">
    <?php if (count($results) > 0):
        foreach ($results as $data): ?>
            <div class="gridBox">
                <h4>Name:
                    <?php echo $data->name ?>
                </h4>
                <h4>Email:
                    <?php echo $data->email ?>
                </h4>
                <p>Time:
                    <?php echo $data->DT ?>
                </p>
                <div class="actionBox">
                    <a href="update.php?update=true&id=<?php echo $data->id ?>" class="commonbtn">update</a>
                    <a href="delete.php?delete=true&id=<?php echo $data->id ?>" class="commonbtn">delete</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div>
        <h1>Please insert some records..</h1>
    </div>
<?php endif; ?>