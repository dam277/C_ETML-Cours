<?php $_SESSION["capcha"] = 111 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div id="secret">
        <input type="text" name="" id="userCapcha">
        <input onclick="DisplayEmail('<?= $_SESSION['capcha'] ?>');" type="submit" value="Submit">
    </div>
</body>
</html>
<script src="captcha.js"></script>