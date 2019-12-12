<h1 class="display-5 mb-3" style="font-size: 30px">Nouveau post</h1>

<form method="post" action="index.php?ctrl=insert_post">
<? if (empty($_SESSION["username"])) { ?>
  <div class="form-group">
    <label for="user">Username</label>
    <input type="text" class="form-control" name="user" id="user" aria-describedby="user" required>
    <small id="userHelp" class="form-text text-muted">You can use any username or use the same as before</small>
  </div>
<? } ?>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" id="title" required>
  </div>
  <div class="form-group">
    <label for="">Content</label>
    <textarea class="form-control" name="content" id="content" rows="3" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>