<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categories</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?= view('inc/NavBar') ?> <!-- NavBar dosyasını çağırır -->


    </div>
</div>
<div class="container mt-5">
    <h1>Categories</h1>
    <div class="list-group">
        <?php foreach ($categories as $category): ?>
            <a href="<?= base_url('category/' . $category['id']) ?>"
               class="list-group-item list-group-item-action">
                <?= $category['category'] ?>
            </a>
        <?php endforeach; ?>
    </div>



</div>
</body>
</html>