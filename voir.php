<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Voire</title>
</head>
<body>
    <?php
        require './config.php';
        $query = $db -> query("SELECT * FROM sql_1");

        while($row = $query->fetch()) {
            echo '<h2>'. $row['nom']. '</h2>';
            echo '<a href='. $row['photo']. '>'. $row['nom'].'</a>';
        }
    ?>
</body>
</html>