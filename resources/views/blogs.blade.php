<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blogs</title>
    <link rel="stylesheet" href="css/blog.css">
</head>
<body>
 


<?php foreach($blogs as $blog): ?>
    
    <h1>
        <a href="/blogs/<?= $blog->slug; ?>"> <?= $blog->title; ?> </a>
    </h1>

    <h3>
        <?= $blog->intro; ?>
    </h3>

   <p>
             <?= $blog->body; ?>

   </p>

<?php endforeach; ?>


   
</body>
</html>