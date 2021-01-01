<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JobLister</title>
    <link rel="stylesheet" href="css/styles/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles/style.css">
</head>
<body>
    <div class="container">
        <div class="header clearfix">
          <nav>
            <ul class="nav nav-pills float-right">
              <li class="nav-item">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="create.php">Post job</a>
              </li>
            </ul>
          </nav>
          <h3 class="text-muted"><?php echo SITE_TITLE?></h3>
        </div>  
        <?php displayMessage();?>