<!DOCTYPE html>
<html>
<head>
	<title>Glasbena lestvica</title>
  <link rel="stylesheet" type="text/css" href="/css/login-style.css">
  <script src="/js/jquery-3.2.1.min.js"></script>
  <script src="/js/login-form.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="with=device-with, initial-scale=1">
</head>
<body>

	<div class="login-page">
  <div class="form">

    <form class="register-form" method="post" action="validation.php">
      <input style="display:none">
      <input type="text" placeholder="Username" name="username" required="required" />
      <input type="text" placeholder="First Name" name="first_name" required="required"/>
      <input type="text" placeholder="Last Name" name="last_name" required="required"/>
      <input type="tel" placeholder="Telephone Number" name="tel_number" required="required"/>
      <input type="password" placeholder="Password" name="password" required="required"/>
      <input type="password" placeholder="Repeat Password" name="repeated_password" required="required"/>
      <input type="text" placeholder="Email" name="email" required="required"/>
      <button name="register_submit" name="sign_up">Sign Up</button>
      <p class="message">You already registered? <a href="#">Sign in</a></p>
    </form>

    <form class="login-form" method="post" action="validation.php">
      <input type="text" placeholder="username" name="username" required = "required"/>
      <input type="password" placeholder="password" name="password" required="required"/>
      <button name="login_submit" value="Submit">Login</button>
      <p class="message">Not registered? <a href="#">Create an account</a></p>
    </form>

  </div>
</div>
</body>
</html>