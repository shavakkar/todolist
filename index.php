<?php
    include("database.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <form action="handleActions.php" method="post">
            <h1 class="top-heading">TODO LIST Application</h1>
            <div class="input-container">
                <input type="text" name="inputBox" id="inputBox">
                <button id="add" name="add" type="submit">ADD</button>
            </div>
            <ul class="list">
                <?php 
                    $itemList = get_items();
                    while($row=$itemList->fetch_assoc())
                    {
                ?>
                <li class="item">
                    <p><?php echo $row["item"]; ?></p>
                    <div class="icon-container">
                        <button type="submit" name="checked" id="check" value="<?php echo $row["id"]; ?>"><i class="fas fa-check-circle"></i></button>
                        <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"]; ?>"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </li>
                <?php } ?>
            </ul>
            <hr>
            <?php 
                    $itemList = get_items_checked();
                    while($row=$itemList->fetch_assoc())
                    {
                ?>
            <ul class="list">
                <li class="item fade">
                    <p class="deleted-text"><span><?php echo $row["item"]; ?></span></p>
                    <div class="icon-container">
                        <button type="submit" name="" id="check"><i class="fas fa-check-circle hidden"></i></button>
                        <button type="submit" name="deleted" id="delete" value="<?php echo $row["id"]; ?>"><i class="fas fa-trash-alt"></i></button>
                    </div>
                </li>
                <?php } ?>
            </ul>
        </form>
    </div>
    <script src="https://kit.fontawesome.com/fb7652e7a0.js" crossorigin="anonymous"></script>
</body>
</html>