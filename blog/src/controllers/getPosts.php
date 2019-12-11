<?php

require_once("./controllers/connexion.php");

$query = new MongoDB\Driver\Query([]);
$posts = $mng->executeQuery("blog.posts", $query)->toArray();


// Display all posts, recursive function
function displayPosts($lvlIndent, $posts) {
    // For each post display info
    foreach ($posts as $post) {
    ?>
    <div class="card mb-1" style="margin-left: <? echo $lvlIndent*60 ?>px">
        <div class="card-header">
            <? echo $post->user ?>, <? $date = new DateTime($post->date); echo $date->format("D-d-M-Y");?>
        </div>
        <div class="card-body">
            <h5 class="card-title"><? echo $post->title ?></h5>
            <p class="card-text"><? echo $post->content ?></p>
            <a href="#" class="btn btn-primary">Répondre</a>
        </div>
    </div>
    <?  
        // If there is responses
        if (!empty($post->responses)) {
            // Increase indentation and recall function
            displayPosts(++$lvlIndent, $post->responses);
            // Decrease indentation when done
            --$lvlIndent;
            ?> <hr> <?
        }
    }
}