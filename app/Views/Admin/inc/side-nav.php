<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="<?= base_url('css/style.css') ?>">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


<div class="d-flex">
    <!-- Sidebar -->
    <div class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white" style="width: 280px; height: 100vh; position: fixed;">
        <a href="users" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-light text-decoration-none">
            <span class="fs-4">My Blog</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item">
                <a href="<?= base_url('admin/users') ?>" class="nav-link text-white <?= current_url() === base_url('admin/users') ? 'active bg-secondary' : '' ?>">
                    <i class="fa fa-users" aria-hidden="true"></i> Users
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/posts') ?>" class="nav-link text-white cen <?= current_url() === base_url('admin/posts') ? 'active bg-secondary' : '' ?>">
                    <i class="fa fa-file-text" aria-hidden="true" ></i> Posts
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/categories') ?>" class="nav-link text-white <?= current_url() === base_url('admin/categories') ? 'active bg-secondary' : '' ?>">
                    <i class="fa fa-tags" aria-hidden="true"></i> Categories
                </a>
            </li>
            <li>
                <a href="<?= base_url('admin/comments') ?>" class="nav-link text-white <?= current_url() === base_url('admin/comments') ? 'active bg-secondary' : '' ?>">
                    <i class="fa fa-comments" aria-hidden="true"></i> Comments
                </a>
            </li>

        </ul>
        <hr>
        <div>
            <a href="<?= base_url('logout') ?>" class="btn btn-danger btn-sm w-100">Logout</a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="content flex-grow-1 p-4" style="margin-left: 280px;">
        <!-- Sayfanın içeriği burada yer alır -->
        <?= $this->renderSection('content') ?>
    </div>
</div>