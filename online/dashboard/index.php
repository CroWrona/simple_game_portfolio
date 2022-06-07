<?php
include("auth_session.php");
?>

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

        <form class="form" autocomplete="off" method="post">
            <div class="form__img" aria-hidden="true"></div>

            <div class="form__spacer" aria-hidden="true"></div>
            <button class="form__button">     <?php echo $_SESSION['username']; ?>    </button>

            <div class="form__p">
              <p><a href="/online/dashboard/logout.php">Logout</a><p></p>
          </div>
            <div class="form__p">
              <p><a href="https://www.wrona.tk/">Home</a><p></p>
          </div>

        </form>

</body>
</html>
