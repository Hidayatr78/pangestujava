<a class="navbar-brand" href="<?= base_url('/') ?>">
    <img src="<?= base_url('/upload/image/config/' . $konfigurasi['logo']) ?>" alt="" width="60" height="60" class="d-inline-block align-top rounded-circle">
    <a class="navbar-brand" href="<?= base_url('/') ?>"><?= $biodata['panggilan']; ?></a>
</a>
<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ms-auto">
        <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#about">About</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#skill">Skills</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#project">Project</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#contact">Contact</a>
        </li>
    </ul>
</div>
</div>
</nav>
<!-- End Navbar -->