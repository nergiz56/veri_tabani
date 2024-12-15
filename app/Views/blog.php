<?= view('inc/NavBar') ?>

<div class="container mt-5">
    <section class="row">
        <?php if (!empty($posts)): ?>
            <main class="col-lg-8">
                <?php foreach ($posts as $post): ?>
                    <div class="card main-blog-card mb-5">
                        <?php if (!empty($post['cover_url']) && file_exists('upload/blog/' . $post['cover_url'])): ?>
                            <img src="<?= base_url('upload/blog/' . esc($post['cover_url'])); ?>" class="card-img-top" alt="Post Image">
                        <?php else: ?>
                            <p class="text-muted text-center">No Image Available</p>
                        <?php endif; ?>

                        <div class="card-body">
                            <h5 class="card-title"><?= esc($post['post_title']) ?></h5>
                            <p class="card-text">
                                <?= mb_substr(strip_tags($post['post_text']), 0, 100, 'UTF-8') ?>...
                            </p>
                            <a href="/blog/view/<?= esc($post['post_id']) ?>" class="btn btn-primary">Read more</a>
                            <hr>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="react-btns">
                                    <?php
                                    $post_id = $post['post_id'];
                                    if ($logged):
                                        $liked = $postLikeModel->isLikedByUser($post_id, $user_id);
                                        if ($liked): ?>
                                            <i class="fa fa-thumbs-up liked like-btn"
                                               data-post-id="<?= esc($post_id) ?>"
                                               data-liked="1"></i>
                                        <?php else: ?>
                                            <i class="fa fa-thumbs-up like-btn"
                                               data-post-id="<?= esc($post_id) ?>"
                                               data-liked="0"></i>
                                        <?php endif; ?>
                                    <?php else: ?>
                                        <i class="fa fa-thumbs-up"></i>
                                    <?php endif; ?>
                                    Likes (<span><?= esc($postLikeModel->getLikeCount($post_id)) ?></span>)
                                    <a href="/blog/view/<?= esc($post_id) ?>#comments">
                                        <i class="fa fa-comment"></i> Comments
                                    </a>
                                </div>
                                <small class="text-body-secondary">
                                    <?= isset($post['created_at']) ? esc($post['created_at']) : 'N/A' ?>
                                </small>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </main>
        <?php else: ?>
            <div class="alert alert-warning text-center">No posts available.</div>
        <?php endif; ?>

        <aside class="col-lg-4">
            <div class="list-group category-aside">
                <a href="#" class="list-group-item list-group-item-action active">Categories</a>
                <?php if (!empty($categories)): ?>
                    <?php foreach ($categories as $category): ?>
                        <a href="/blog/category/<?= esc($category['id']) ?>"
                           class="list-group-item list-group-item-action">
                            <?= esc($category['category']) ?>
                        </a>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="alert alert-info text-center">No categories available.</div>
                <?php endif; ?>
            </div>
        </aside>
    </section>
</div>

<!-- Stil Dosyaları -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    $(document).ready(function () {
        $('.like-btn').click(function () {
            const postId = $(this).data('post-id');
            const isLiked = $(this).data('liked') == 1;
            const likeBtn = $(this);

            $.ajax({
                url: "<?= base_url('blog/toggleLike') ?>",
                type: "POST",
                data: { post_id: postId },
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        likeBtn.data('liked', isLiked ? 0 : 1);
                        likeBtn.toggleClass('liked');
                        likeBtn.siblings('.like-count').text(response.likeCount);
                    } else {
                        alert(response.message);
                    }
                },
                error: function () {
                    alert('An error occurred while processing your request.');
                }
            });
        });
    });
</script>