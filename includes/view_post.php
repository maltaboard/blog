<?php

if(isset($_GET['post'])){
  $postSlug = $_GET['post'];
} else {
  echo 'Error, no post was selected';
  die();
}


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
      $sql = $db->prepare("SELECT * FROM posts WHERE postSlug = ?");
      $sql->bindParam(1, $postSlug);
$post = array();
if ($sql->execute()) {
    while ($post = $sql->fetch(PDO::FETCH_ASSOC)) {
?>
          <!-- Blog Article -->
          <div class="card mb-4">
            <img class="card-img-top" src="/blog/assets/images/<?php echo $post['postImage']; ?>" alt="Card image cap">
            <div class="card-body">
              <h2 class="card-title"><?php echo $post['postTitle']; ?></h2>
              <p class="card-text"><?php echo $post['postContent']; ?></p>
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

        </div>