<!DOCTYPE html>
<html>
<head>
    <title>Admin - Posts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('css/side-bar.css'); ?>">
</head>
<body>
<?= $this->include('admin/inc/side-nav'); ?>

<div class="container mt-5">
    <h3>All Posts
        <a href="#" class="btn btn-success">Add New</a>
    </h3>
    <?php if (!empty($posts)): ?>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Category</th>
                <th>Published</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($posts as $post): ?>
                <tr>
                    <td><?= esc($post['post_id']); ?></td>
                    <td><?= esc($post['post_title']); ?></td>
                    <td><?= esc($post['category_name']); ?></td>
                    <td><?= $post['publish'] == 1 ? 'Public' : 'Private'; ?></td>
                    <td>
                        <a href="#" class="btn btn-warning btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <div class="alert alert-warning">No posts available!</div>
    <?php endif; ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>