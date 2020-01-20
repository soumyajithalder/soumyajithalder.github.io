<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pager</title>
</head>
<body>
   <?php
    for($page=1;$page<=10;$page++){
        echo '<a href="php-assignment-' . $page . '.php">' . $page . '</a> ';
    }
    ?>
</body>
</html>