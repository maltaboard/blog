<?php

if(isset($_GET['post'])){
  $postSlug = $_GET['post'];
} else {
  echo 'Error, no post was selected';
  die();
}

?>

    <!-- Page Content -->
    <div class="container">

      <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

          <h1 class="my-4">MaltaBoard
            <small>Latest Articles</small>
          </h1>

            <?php
              getPost($postSlug);
            ?>

        </div>