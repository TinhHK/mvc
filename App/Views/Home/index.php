<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
</head>
<body>
<?php
    if(isset($_POST['name'])){
        echo htmlspecialchars("Hello {$_POST['name']}");
    }
?>
<br>
<form action="" method="post">
    <div>
        <label for="">Your name</label>
        <input type="text" name="name" autofocus>
    </div>
    <div>
        <button type="submit">Submit</button>
    </div>
</form>
</body>
</html>