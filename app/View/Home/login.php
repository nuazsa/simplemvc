<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $model['title']; ?></title>
</head>

<body>
    <?php if (isset($model['msg'])) {
    ?>
        <p><?= $model['msg']; ?></p>
    <?php
    } ?>
    <h1>Login Form</h1>
    <form action="/authenticate" method="POST">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username">
        <label for="password">Password:</label>
        <input type="passwors" id="password" name="password">
        <button type="submit">submit</button>
    </form>
</body>

</html>