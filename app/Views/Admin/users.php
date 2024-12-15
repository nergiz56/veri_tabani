<!DOCTYPE html>
<html>
<head>
    <title>Admin - Users</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        .main-content {
            margin-left: 280px; /* Sidebar genişliği kadar boşluk bırak */
            padding: 20px;
        }
    </style>
</head>
<body>
<!-- Side Navigation -->
<?php include(APPPATH . 'Views/admin/inc/side-nav.php'); ?>

<!-- Main Content -->
<div class="main-content">
    <div class="container mt-5">
        <h3>All Users</h3>
        <table class="table  table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php if (!empty($users) && is_array($users)) : ?>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?= esc($user['id']) ?></td>
                        <td><?= esc($user['username']) ?></td>
                        <td><?= esc($user['email']) ?></td>
                        <td>
                            <a href="/users/delete/<?= $user['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else : ?>
                <tr>
                    <td colspan="4" class="text-center">No users found.</td>
                </tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>