<!DOCTYPE html>
<html>
<head>
    <title>Admin - Categories</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<?= $this->include('admin/inc/side-nav'); ?>

<div class="container mt-5">
    <h1>Category Management</h1><br><br>

    <!-- Success Message -->
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <!-- Kategori Ekleme Formu -->


    <!-- Kategori Listesi -->
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Category Name</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($categories)): ?>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?= esc($category['id']); ?></td>
                    <td><?= esc($category['category']); ?></td>
                    <td>
                        <a href="<?= base_url('admin/categories/delete/' . $category['id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="3" class="text-center">No categories found.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>