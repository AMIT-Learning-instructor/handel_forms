<?php require_once('database.php') ?>
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
        <div class="col-12">

            <?php 

                $rows = getBlogs();
                while( $row = mysqli_fetch_assoc($rows)){
                    echo '
                    <div class="card" style=" margin:50px;">
                        <div class="card-body">
                            <h5 class="card-title">'.$row['title'].'</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">'.$row['name'].'</h6>
                            <p class="card-text">'.$row['short_description'].'</p>
                            <a href="post.php?blog_id='.$row['id'].'" class="card-link">read more</a>
                        </div>
                    </div>
                    ';
                }   
            ?>
        </div>
    </div>
    
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>