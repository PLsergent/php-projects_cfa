<?php

require_once("./templates/v_header.php");

?>
  <a href="#" class="btn btn-info btn-lg mb-4">Nouveau post +</a>
<?

displayPosts(0, $posts);

require_once("./templates/v_footer.php");