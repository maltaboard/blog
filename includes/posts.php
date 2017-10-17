<?php



$dbName = 'blog';
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = '';


      $db = new PDO( "mysql:dbname=$dbName;host=$dbHost" , $dbUser , $dbPass );

      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
try {
      $sql = $db->prepare("SELECT * FROM posts");
$post = array();
if ($sql->execute()) {
    while ($post = $sql->fetch(PDO::FETCH_ASSOC)) {
      ?>

          <!-- Blog Post -->
          <div class="card mb-4">
            <img class="card-img-top" src="/blog/assets/images/<?php echo $post['postImage']; ?>" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title"><?php echo $post['postTitle']; ?></h2>
              <p class="card-text"><?php echo $post['postContent']; ?></p>
              <a href="/blog/post.php?post=<?php echo $post['postSlug']; ?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on <?php echo $post['postDate']; ?> by
              <a href="#"><?php echo $post['postAuthorId']; ?></a>
            </div>
          </div>    

<?php
    }
}      


} catch ( PDOException $e) {
    echo $e->getMessage();
    $sql = null;
}
?>




          <!-- Pagination -->
          <ul class="pagination justify-content-center mb-4">
            <li class="page-item">
              <a class="page-link" href="#">&larr; Older</a>
            </li>
            <li class="page-item disabled">
              <a class="page-link" href="#">Newer &rarr;</a>
            </li>
          </ul>

        </div>