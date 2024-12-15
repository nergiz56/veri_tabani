
<?php include 'inc/NavBar.php'; ?>

<!-- Styles -->
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    <div class="card mb-4">
        <img src="/upload/blog/<?= esc($post['cover_url']) ?>" class="card-img-top" alt="<?= esc($post['post_title']) ?>">
        <div class="card-body">
            <h5 class="card-title"><?= esc($post['post_title']) ?></h5>
            <p class="card-text"><?= esc(substr($post['post_text'], 0, 100)) ?>...</p>
        </div>

        <div class="d-flex justify-content-between align-items-center px-3 py-2 border-top">
            <div class="react-btns">
                <?php if ($logged): ?>
                    <?php $liked = $postLikeModel->isLikedByUser($post_id, $user_id); ?>
                    <i class="fa fa-thumbs-up like-btn <?= $liked ? 'liked' : '' ?>"
                       data-post-id="<?= esc($post_id) ?>"
                       data-liked="<?= $liked ? 1 : 0 ?>"></i>
                <?php else: ?>
                    <i class="fa fa-thumbs-up"></i> Please log in!
                <?php endif; ?>
                Likes (<span class="like-count"><?= esc($likeCount) ?></span>)
                <a href="#comments" class="ms-3">
                    <i class="fa fa-comment"></i> Comments (<span><?= count($comments) ?></span>)
                </a>
            </div>
            <small class="text-muted"><?= esc($post['created_at'] ?? 'N/A') ?></small>
        </div>
    </div>

    <form action="<?= base_url('blog/addComment') ?>" method="post" class="mb-4">
        <h5 class="text-secondary mb-3">Add Comment</h5>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
        <?php endif; ?>
        <div class="mb-3">
            <textarea name="comment" class="form-control" placeholder="Write your comment..." rows="3"></textarea>
            <input type="hidden" name="post_id" value="<?= esc($post['post_id']) ?>">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

    <div id="comments" class="mb-5">
        <h5 class="mb-4">Comments</h5>
        <?php if (!empty($comments)): ?>
            <?php foreach ($comments as $comment): ?>
                <div class="comment mb-3 p-3 border rounded">
                    <p><?= esc($comment['comment']) ?></p>
                    <small class="text-muted">
                        User ID: <?= esc($comment['user_id']) ?> | <?= esc($comment['created_at']) ?>
                    </small>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>No comments yet. Be the first to comment!</p>
        <?php endif; ?>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function () {
        $('.like-btn').click(function () {
            const postId = $(this).data('post-id');
            const likeBtn = $(this);

            $.post("<?= base_url('blog/toggleLike') ?>", { post_id: postId }, function (response) {
                if (response.success) {
                    likeBtn.siblings('.like-count').text(response.likeCount);
                    likeBtn.toggleClass('liked');
                } else {
                    alert(response.message);
                }
            }, "json").fail(function () {
                alert('An error occurred. Please try again.');
            });
        });
    });
</script>
