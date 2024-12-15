<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts in Category</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?= view('inc/NavBar') ?>
<div class="container mt-5">
    <h1>Posts in Category</h1>
    <?php if (!empty($posts)): ?>
        <ul class="list-group">
            <?php foreach ($posts as $post): ?>
                <li class="list-group-item">
                    <h5><?= $post['post_title'] ?></h5>
                    <img src="<?= base_url('uploads/' . $post['cover_url']) ?>" alt="<?= $post['post_title'] ?>" class="img-thumbnail">
                    <p><?= $post['post_text'] ?></p>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>No posts found in this category.</p>
    <?php endif; ?>
</div>
</body>
</html>