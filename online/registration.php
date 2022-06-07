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
    // When form submitted, insert values into the database.
    if (isset($_REQUEST['username'])) {
        // removes backslashes

        $username = stripslashes($_REQUEST['username']);
        $username = mysqli_real_escape_string($con, $username);

        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);

        $email    = stripslashes($_REQUEST['email']);
        $email    = mysqli_real_escape_string($con, $email);

        $create_datetime = date("Y-m-d H:i:s");

        $query    = "INSERT into `users` (username, password, email, create_datetime)
                     VALUES ('$username', '" . md5($password) . "', '$email', '$create_datetime')";

        $result   = mysqli_query($con, $query);

        if ($result && $username!="") {
            echo "<div class='form'>
                  <h4>You are registered successfully.</h4><br/>
                  <p class='link'>Click here to <a href='/online/login.php'>Login</a></p>
                  </div>";
        } else {
            echo "<div class='form'>
                  <h4>Required fields are missing.</h4><br/>
                  <p class='link'>Click here to <a href='registration.php'>registration</a> again.</p>
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
                    aria-label="Email"
                    class="form__input"
                    type="text"
                    id="email"
                    placeholder=" "
                    name="email"
                />
                <label class="form__input-label" for="password">Email</label>
            </div>

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
            <button class="form__button" name="submit" value="Register">Register</button>

            <div class="form__p">
              <p><a href="/online/login.php">Sign in</a><p></p>
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
