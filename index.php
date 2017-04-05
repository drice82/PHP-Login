<?php require "login/loginheader.php"; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Reset Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="css/bootstrap.css" rel="stylesheet" media="screen">
    <link href="css/main.css" rel="stylesheet" media="screen">
  </head>

  <body>
    <div class="container">

      <form class="form-signup" id="usersignup" name="usersignup" method="post" action="userinfo.php">
        <h2 class="form-signup-heading">Reset Password</h2>
        <input name="password1" id="password1" type="password" class="form-control" placeholder="Password">

        <button name="Submit" id="submit" class="btn btn-lg btn-primary btn-block" type="submit">OK</button>

        <div id="message"></div>
      </form>

      <div class="form-signin">
        <div class="alert alert-success">Your username is <strong><?php echo $_SESSION['username'];?></strong>. <br> You have been <strong>successfully logged in</strong>.</div>
        <a href="login/logout.php" class="btn btn-default btn-lg btn-block">Logout</a>
      </div>


    </div> <!-- /container -->

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script type="text/javascript" src="login/js/bootstrap.js"></script>

    <script src="/login/js/signup.js"></script>


    <script src="http://jqueryvalidation.org/files/dist/jquery.validate.min.js"></script>
<script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
<script>

$( "#usersignup" ).validate({
  rules: {
    password1: {
      required: true,
      minlength: 4
	}
  }
});
</script>

  </body>
</html>

