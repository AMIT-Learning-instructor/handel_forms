<?php require_once('database.php') ?>

<?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = htmlspecialchars($_POST['title']);
        $short_description =htmlspecialchars($_POST['short-description']);
        $content=htmlspecialchars($_POST['content']);
        $author_id=htmlspecialchars($_POST['author_id']);
        if(empty($title) || empty($short_description)|| empty($content) || empty($author_id)){
            echo "Empty values";
        }else{
            if(insertPost($title,$short_description,$content,$author_id)){
                echo "ADDED";
            }else {
                echo "ERROR";
            }
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blogs</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Blogs</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="new-post.php">New</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<main class="container ">
    <div class="row">
        <div class="col-12 mt-5">
        <form class="row g-3" method="POST" action="new-post.php">
            <div class="col-md-6">
                <label for="title" class="form-label">Title</label>
                <input type="text" required name="title" class="form-control" id="title">
            </div>
            <div class="col-md-6">
                <label for="author" class="form-label">Authors</label>
                <select id="author" required name="author_id" class="form-select">
                    <?php
                        $results = getAuthors();
                        while ($row = mysqli_fetch_assoc($results)){
                            echo "<option value=".$row['id'].">".$row['name']."</option>";
                        }
                    ?>
                    
                </select>
            </div>
            <div class="col-md-12">
                <label for="short-description" class="form-label">short description</label>
                <input type="text" name="short-description" class="form-control" id="short-description">
            </div>
          
            <div class="col-md-12">
                <label for="content" class="form-label">content</label>
                <textarea class="form-control" name="content" id="content" cols="30" rows="10"></textarea>
            </div>
          
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
    </div>
    
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>