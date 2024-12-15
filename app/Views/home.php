<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">MyBlog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="home avbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/blog">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/category">Categories</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container mt-5">
    <h1>Welcome to My Blog</h1>
    <p>This is the homepage of your blog application. Navigate through the menu to explore posts and categories.</p>

    <form action="<?= base_url('home/saveComment') ?>" method="post" class="mt-4">
        <div class="mb-3">
            <label for="comment" class="form-label">Share your thoughts</label>
            <textarea class="form-control" id="comment" name="comment" rows="4" placeholder="Write your comment here..."></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<footer class="bg-light text-center text-lg-start mt-5">
    <div class="container p-4">
        <p>© 2024 MyBlog. All rights reserved.</p>
    </div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>