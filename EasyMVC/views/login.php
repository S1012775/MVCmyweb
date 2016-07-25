<?php
// session_start();

// require ("loginfun.php");
// login();



?>
<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login form</title>
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="../views/css/loginstyle.css" rel='stylesheet' type='text/css' />
    <link href="../views/css/style.scss" rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="../views/css/reset.css">
    <script src="../views/js/prefixfree.min.js"></script>
  </head>

  <body>
    <div class="login">
    <h1>Login</h1>

    <form class="form" method="post">

      <p class="field">
        <input type="text" name="username" placeholder="Username" required/>
        <i class="fa fa-user"></i>
      </p>

      <p class="field">
        <input type="password" name="password" placeholder="Password" required/>
        <i class="fa fa-lock"></i>
      </p>

      <p class="submit"><input type="submit" name="login" value="Login"></p>
        <p><?php echo $wrong?></p>

    </form>
  </div> <!--/ Login-->

<div class="copyright">
    <p>Copyright &copy; 2014. Created by <a href="http://febbygunawan.com" target="_blank">Febby Gunawan</a></p>
    
    
    
    
    
  </body>
</html>
