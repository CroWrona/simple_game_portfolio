<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Terrarium Spiders</title>
	<link rel="stylesheet" type="text/css" href="/online/style.css">
        <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
</head>
<body>

<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con, $email);
        $gold = stripslashes($_REQUEST['gold']);
        $gold = mysqli_real_escape_string($con, $gold);


        // Check user is exist in the database
        $query    = "SELECT * FROM `users`
 WHERE username='$username'
 AND password = '" . md5($password ) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {

            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            $_SESSION['email'] = $email;
            $_SESSION['gold'] = $gold;

            // Redirect to user dashboard page
           header("Location: /online/dashboard/index.php");
             //  header("Location: /database_spider/spider_add.php");
        } else {
            echo "<div class='form'>
                  <h4>Incorrect Username/password.</h4><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>

        <form class="form" autocomplete="off" method="post">
            <div class="form__img" aria-hidden="true"></div>
            <div class="form__input-container">
                <input
                    aria-label="User"
                    class="form__input"
                    type="text"
                    id="user"
                    placeholder=" "
                    name="username"
                />
                <label class="form__input-label" for="user">Name</label>
            </div>
            <div class="form__input-container">
                <input
                    aria-label="Password"
                    class="form__input"
                    type="password"
                    id="password"
                    placeholder=" "
                    name="password"
                />
                <label class="form__input-label" for="password">Password</label>
            </div>
            <div class="form__spacer" aria-hidden="true"></div>
            <button class="form__button" name="submit" value="Login">Login</button>

            <div class="form__p">
              <p>Not a member? <a href="/online/registration.php">Create Account</a><p></p>
          </div>
            <div class="form__p">
              <p><a href="https://www.wrona.tk/">Home</a><p></p>
          </div>


        </form>

<?php
    }
?>

</body>
</html>