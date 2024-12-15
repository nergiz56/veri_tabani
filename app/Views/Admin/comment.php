<?= $this->include('admin/inc/side-nav'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Comments</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Manage Comments</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Comment ID</th>
            <th>Comment</th>
            <th>User ID</th>
            <th>Post ID</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($comments)): ?>
            <?php foreach ($comments as $comment): ?>
                <tr>
                    <td><?= esc($comment['comment_id'] ?? 'N/A') ?></td> <!-- Eğer 'comment_id' varsa kullan -->
                    <td><?= esc($comment['comment']) ?></td>
                    <td><?= esc($comment['user_id']) ?></td>
                    <td><?= esc($comment['post_id']) ?></td>
                    <td>
                        <a href="<?= base_url('admin/comments/delete/' . $comment['comment_id']) ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">No comments found.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>