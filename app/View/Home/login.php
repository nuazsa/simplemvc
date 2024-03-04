<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $model['title']; ?></title>
</head>

<body>
    <h1>Login Form</h1>
    <form action="/login" method="POST">
        <label for="username">Username: </label>
        <input type="text" id="username" name="username">
        <label for="password">Password:</label>
        <input type="passwors" id="password" name="password">
        <button type="submit">submit</button>
    </form>
</body>

</html>