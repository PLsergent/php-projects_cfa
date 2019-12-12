<?php

require_once("./controllers/connexion.php");


$query = new MongoDB\Driver\Query([]);
$posts = $mng->executeQuery("blog.posts", $query)->toArray();
$posts = array_reverse($posts, true);

// Display all posts, recursive function
function displayPosts($lvlIndent, $posts, $_id) {
    // For each post display info
    foreach ($posts as $post) {
    ?>
    <div class="card mb-1" style="margin-left: <? echo $lvlIndent*60 ?>px">
        <div class="card-header">
            <? echo $post->user ?>, <? $date = new DateTime($post->date); echo $date->format("D-d-M-Y H:i");?>
        </div>
        <div class="card-body">
            <h5 class="card-title"><? echo $post->title ?></h5>
            <p class="card-text"><? echo $post->content ?></p>
            <? if ($lvlIndent <= 4) {
                $id = ($_id == 0) ? $post->_id : $_id; ?>
                <a href="index.php?ctrl=respond&id=<? echo $id ?>&indent=<? echo $lvlIndent ?>" class="btn btn-primary">Répondre</a>
            <? } ?>
        </div>
    </div>
    <?  
        // If there is responses
        if (!empty($post->responses)) {
            // Increase indentation and recall function
            displayPosts(++$lvlIndent, $post->responses, $id);
            // Decrease indentation when done
            --$lvlIndent;
        }
        if ($lvlIndent == 0) {
            ?> <hr> <?
        }
    }
}