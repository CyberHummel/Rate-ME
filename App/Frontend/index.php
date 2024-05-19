<!DOCTYPE html>
<!-- Sign Up Form -->
<h1>Sign Up</h1>
<form action="register.php" method="post">
  <label for="username">Username:</label>
  <input id="username" name="username" required="" type="text" />
  <label for="email">Email:</label>
  <input id="email" name="email" required="" type="email" />
  <label for="password">Password:</label>
  <input id="password" name="password" required="" type="password" />
  <input name="register" type="submit" value="Register" />
</form>

<!-- Sign In Form -->
<h1>Sign In</h1>
<form action="login.php" method="post">
  <label for="username">Username:</label>
  <input id="username" name="username" required="" type="text" />
  <label for="password">Password:</label>
  <input id="password" name="password" required="" type="password" />
  <input name="login" type="submit" value="Login" />
</form>
