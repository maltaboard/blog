


<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$dbName = 'blog';
$dbHost = 'localhost';
$dbUser = 'root';
$dbPass = 'netek27801lQala321';

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Create Post</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <link rel="stylesheet" href="/blog/assets/css/blog-home.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  	<div class="container">
  		<div class="row">
  			<div class="col-md-12">

			<?php

			if(isset($_POST['submit'])){

				$postTitle = $_POST['postTitle'];
				$postSlug = urlencode ( $_POST['postTitle'] );
				$postSlug = str_replace('+', '-', $postSlug);
				$postSlug = strtolower($postSlug);
				$postContent = $_POST['postContent'];
				$postAuthorID = "1";
				$postCategoryID = "1";
				$postDate = date("Y-m-d");
				$postActive = "1";
				$postImage = "post.jpg";

			try {
			$db = new PDO( "mysql:dbname=$dbName;host=$dbHost" , $dbUser , $dbPass );

			$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			$sql = $db->prepare("INSERT INTO posts (postTitle, postSlug, postContent, postCategoryId, postAuthorId, postDate, postActive, postImage) VALUES (? ,? ,?, ?, ?, ?, ?, ?)");
			$sql->bindParam(1, $postTitle);
			$sql->bindParam(2, $postSlug);
			$sql->bindParam(3, $postContent);
			$sql->bindParam(4, $postCategoryID);
			$sql->bindParam(5, $postAuthorID);
			$sql->bindParam(6, $postDate);
			$sql->bindParam(7, $postActive);
			$sql->bindParam(8, $postImage);
			$sql->execute();

			echo 'New Post entered';
			$sql = null;

			} catch ( PDOException $e) {
				echo $e->getMessage();
				$sql = null;
			}
			} else {

			?>


				<h2>Create a new Post</h2>
				<form  action="create_post.php" method="post">
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1">Post Title</span>
				  <input type="text" class="form-control" name="postTitle">
				</div>
				<br>
				<div class="input-group">
				  <span class="input-group-addon" id="basic-addon1">Post Content</span>	
				  <textarea rows="10" class="form-control" name="postContent"></textarea>
				</div>
				<br>
           <div class="input-group">
            <div class="input-group">
                <label class="input-group-btn">
                    <span class="btn btn-primary" name="postImage">
                        Select post Image <input type="file" style="display: none;" multiple>
                    </span>
                </label>
                <input type="text" class="form-control" readonly>
            </div>
            </div>

        

				<div class="input-group">
				  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
				</div>

			<?php
			}
			?>

			</div>
  		</div>
  	</div>    

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="/blog/assets/js/custom.js"></script>
  </body>
</html>