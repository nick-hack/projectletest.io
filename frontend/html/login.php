<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <link rel="stylesheet" href="../css/style.css">

    <title class="fas fa-user-secret me-2">Login</title>
    <link rel="icon" type="image/x-icon" href="../img/logo/a.png">
</head>

<body>
    <div class="wrapper">
        <div class="logo">
            <!-- <img src="https://www.freepnglogos.com/uploads/twitter-logo-png/twitter-bird-symbols-png-logo-0.png" alt=""> -->
            <img src="../img/logo/a.png" alt="my logo">

        </div>
        <center>
            <div class="text-center mt-4 name">
                Student Portal
            </div>
        </center>
        <br>
        <form class=" p-3 mt-3" onsubmit="event.preventDefault(); login();">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="email" id="email" placeholder="email" required>
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <!-- <input type="button" value="Login" onclick="login()"> -->
            <button class="btn mt-3">Login</button>
        </form>
        <div class="text-center fs-6">
            <a href="#">Forget password?</a> or <a href="#">Sign up</a>
        </div>
    </div>

    <script src="../js/login.js"></script>

</body>

</html>