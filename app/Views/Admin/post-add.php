<?= $this->include('admin/inc/side-nav'); ?>

<div class="container mt-5">
    <h1>Add New Post</h1>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
    <?php endif; ?>

    <form action="<?= base_url('admin/posts/save'); ?>" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="post_title" id="title" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea class="form-control" name="post_text" id="content" rows="5" required></textarea>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" name="category" id="category" required>
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Cover Image</label>
            <input type="file" class="form-control" name="cover_image" id="cover_image" required>
        </div>

        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" name="publish" id="publish" checked>
            <label class="form-check-label" for="publish">Publish</label>
        </div>

        <button type="submit" class="btn btn-primary">Save Post</button>
    </form>
</div>