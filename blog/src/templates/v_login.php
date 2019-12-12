<h1 class="display-5 mb-2" style="font-size: 30px">Login</h1>
<a href="index.php?ctrl=signup">Pas encore de compte ?</a>

<form method="post" id="signup_form" action="index.php?ctrl=user_login">
  <div class="form-group mt-3">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" id="username" aria-describedby="username" required>
    <small class="text-danger"><? if($_GET['error'] == "username") { echo "Username doesn't exist."; } ?></small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="_password" required>
    <small class="text-danger"><? if($_GET['error'] == "password") { echo "Username found but wrong password."; } ?></small>
  </div>
  <button type="submit" id="submit_pwd" class="btn btn-primary">Submit</button>
</form>