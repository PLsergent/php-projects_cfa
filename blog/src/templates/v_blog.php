<?php

require_once("./templates/v_header.php");

?>
  <h1 class="display-4" style="font-size: 48px">Blog</h1>
  <h3 class="lead mb-4">by Sergent Pierre-Louis</h3>
  <a href="index.php?ctrl=new_post" class="btn btn-info btn-lg mb-4">Nouveau post +</a>
<?

displayPosts(0, $posts);

require_once("./templates/v_footer.php");