<?php

//Get All Posts Data
function getAllPosts() {
	$db = connect();
try {
    $sql = $db->prepare("SELECT * FROM posts LEFT JOIN postCategories ON posts.postCategoryId = postCategories.categoryID LEFT JOIN users ON posts.postAuthorId = users.userID");
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
              <a href="/blog/post.php?post=<?php echo $post['postSlug']; ?>" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
              Posted on <?php echo $post['postDate']; ?> by
              <a href="#"><?php echo $post['userName']; ?></a> | Post Category <?php echo $post['categoryName']; ?>
            </div>
          </div>       
	<?php
    	}
	} 
	$sql = null;     
	} catch ( PDOException $e) {
    	echo $e->getMessage();
    	$sql = null;
	}
}

//Get Single Post Data
function getPost($postSlug) {
	$db = connect();
try {
    $sql = $db->prepare("SELECT * FROM posts LEFT JOIN postCategories ON posts.postCategoryId = postCategories.categoryID LEFT JOIN users ON posts.postAuthorId = users.userID WHERE postSlug = ?");
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
              <a href="#"><?php echo $post['userName']; ?></a> | Post Category <?php echo $post['categoryName']; ?>
            </div>
          </div>       
	<?php
    	}
	} 
	$sql = null;     
	} catch ( PDOException $e) {
    	echo $e->getMessage();
    	$sql = null;
	}
}


//Get Selected Category for page
function getCategories($categoryid) {
	$db = connect();
try {
    $sql = $db->prepare("SELECT * FROM posts LEFT JOIN postCategories ON posts.postCategoryId = postCategories.categoryID LEFT JOIN users ON posts.postAuthorId = users.userID WHERE categoryID = ?");
    $sql->bindParam(1, $categoryid);
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
              <a href="#"><?php echo $post['userName']; ?></a> | Post Category <?php echo $post['categoryName']; ?>
            </div>
          </div>       
	<?php
    	}
	} 
	$sql = null;     
	} catch ( PDOException $e) {
    	echo $e->getMessage();
    	$sql = null;
	}
}


//Get Post Categories for Sidebar
function getCategorylist() {
	$db = connect();
try {
    $sql = $db->prepare("SELECT * FROM postCategories");
	$post = array();

	if ($sql->execute()) {
    	while ($category = $sql->fetch(PDO::FETCH_ASSOC)) {
	?>
                    <li>
                      <a href="/blog/post-category.php?categoryid=<?php echo $category['categoryID']; ?>"><?php echo $category['categoryName']; ?></a>
                    </li>		
	<?php
    	}
	} 
	$sql = null;     
	} catch ( PDOException $e) {
    	echo $e->getMessage();
    	$sql = null;
	}
}

      