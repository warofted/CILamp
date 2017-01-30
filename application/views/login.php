<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">

    <title></title>
  </head>
  <body>
    <form name="register" action="/pokes/user_register" method="post">
      <h1>Register</h1>
      <p>Name:</p>
      <input type="text" name="name">

      <p>Alias:</p>
      <input type="text" name="alias">

      <p>Email:</p>
      <input type="text" name="email">

      <p>Password:</p>
      <input type="text" name="pass">

      <p>Password Confirmation:</p>
      <input type="text" name="passconf">

      <p>Register</p>
      <input type=submit name="submit" value="Register!">
    </form>




<h1>Login</h1>
    <form name="login" action="/pokes/login" method="post">
      <p>Email:</p>
      <input type=text name="email">
      <p>Password:</p>
      <input type=text name="password">
      <input type=submit name="submit" value="Sign In">
    </form>



  </body>
</html>
