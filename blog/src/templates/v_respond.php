<h1 class="display-5 mb-3" style="font-size: 30px">Réponse</h1>

<?
    $id = explode(",", $_GET["id"]);
    $query = new MongoDB\Driver\Query(["_id" => new \MongoDB\BSON\ObjectId($id[0])]);
    $result = $mng->executeQuery("blog.posts", $query)->toArray();
    $title = $result[0]->title;
?>
<form method="post" action="index.php?ctrl=insert_respond&id=<? echo $_GET['id'] ?>&indent=<? echo $indent ?>">
<? if (empty($_SESSION["username"])) { ?>
  <div class="form-group">
    <label for="user">Username</label>
    <input type="text" class="form-control" name="user" id="user" aria-describedby="user" required>
    <small id="userHelp" class="form-text text-muted">You can use any username or use the same as before</small>
  </div>
<? } ?>
  <div class="form-group">
    <label for="title">Title</label>
    <input type="text" class="form-control" name="title" id="title" value="<? echo $title ?> - " required>
  </div>
  <div class="form-group">
    <label for="">Content</label>
    <textarea class="form-control" name="content" id="content" rows="3" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>