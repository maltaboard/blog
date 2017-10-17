<?php

if(isset($_GET['categoryid'])){
  $categoryid = $_GET['categoryid'];
} else {
  echo 'Error, Category contained no posts';
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
              getCategories($categoryid);
            ?>

        </div>