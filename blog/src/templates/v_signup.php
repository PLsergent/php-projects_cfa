<h1 class="display-5 mb-3" style="font-size: 30px">Sign up</h1>

<form method="post" id="signup_form" action="index.php?ctrl=insert_user">
  <div class="form-group">
    <label for="username">Username</label>
    <input type="text" class="form-control" name="username" id="username" aria-describedby="username" required>
    <small class="text-danger"><? if($_GET['error'] == "username") { echo "Username already used."; } ?></small>
  </div>
  <div class="form-group">
    <label for="password">Password</label>
    <input type="password" class="form-control" name="password" id="password" required>
  </div>
  <div class="form-group">
    <label for="password_verif">Password again</label>
    <input type="password" class="form-control" id="password_verif" required>
  </div>
  <small class="text-danger pass_match mt-1">Passwords do not match.</small><br>
  <button type="submit" id="submit_pwd" class="btn btn-primary">Submit</button>
</form>