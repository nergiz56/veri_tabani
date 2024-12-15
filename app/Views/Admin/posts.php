<?= $this->include('admin/inc/side-nav'); ?>

<div class="container mt-5">
    <h1>All Posts</h1>
    <a href="<?= base_url('admin/posts/add'); ?>" class="btn btn-success mb-3">Add New</a>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Category</th>
            <th>Image</th>
            <th>Published</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><?= esc($post['post_id']); ?></td>
                <td><?= esc($post['post_title']); ?></td>
                <td><?= esc($post['category']); ?></td>
                <td>
                    <?php if (!empty($post['cover_url'])): ?>
                        <img src="<?= base_url($post['cover_url']); ?>" alt="Post Image" class="img-fluid" style="max-width: 100px;">
                    <?php else: ?>
                        No Image Available
                    <?php endif; ?>
                </td>
                <td><?= $post['publish'] ? 'Public' : 'Draft'; ?></td>
                <td>
                    <a href="<?= base_url('admin/posts/delete/' . $post['post_id']); ?>" class="btn btn-danger btn-sm">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

</div>