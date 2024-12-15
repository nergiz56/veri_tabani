<?php if (!empty($posts)): ?>
    <ul class="list-group">
        <?php foreach ($posts as $post): ?>
            <li class="list-group-item">
                <?= $post['post_title'] ?>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <p>No posts found in this category.</p>
<?php endif; ?>