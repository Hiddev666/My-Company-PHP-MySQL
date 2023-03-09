<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>


    <div class="register-container">
    <div class="register-top">
        <img src="logo.png" alt="logo" class="logo">
        <p class="title">Login Admin</p>
    </div>
    <div class="register-bottom">
    <div class="form-wrapper">
    <form action="login.php" method="POST" class="form" >
        <label for="username" class="username-label">Username</label> <br>
        <div class="wrapper">
            <input type="text" name="username" class="username-input">
            </div>
            <label for="password" class="password-label">Password</label> <br>
            <div class="wrapper">
            <input type="password" name="password" class="password-input">
            </div>
        <div class="wrapper">
            <input type="submit" name="submit" value="Login" class="btn-login">
        </div>
        </div>
    </form>
    </div>
    </div>
</body>
</html>