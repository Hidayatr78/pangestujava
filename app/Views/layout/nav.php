<!-- Navbar Start -->
<nav class="navbar fixed-top shadow-sm navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-lg-5">
    <a href="<?php base_url('/') ?>" class="navbar-brand ml-lg-3">
        <h3 class="m-0 display-5"><span class="text-primary"><?= $web; ?></span><?= $web2; ?></h1>
    </a>
    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse px-lg-3" id="navbarCollapse">
        <div class="navbar-nav m-auto py-0">
            <a href="#home" class="nav-item nav-link active">Home</a>
            <a href="#about" class="nav-item nav-link">About</a>
            <a href="#qualification" class="nav-item nav-link">Quality</a>
            <a href="#skill" class="nav-item nav-link">Skill</a>
            <a href="#service" class="nav-item nav-link">Service</a>
            <a href="#portfolio" class="nav-item nav-link">Portfolio</a>
            <a href="#contact" class="nav-item nav-link">Contact</a>
        </div>
        <a href="<?php base_url('/') ?>" class="navbar-brand ml-lg-3">
            <!-- <a href="" class="btn btn-outline-primary d-none d-lg-block">Hire Me</a> -->
            <img src="<?= base_url('/upload/image/config/' . $konfigurasi['logo']) ?>" alt="" width="45" height="45" class="d-inline-block align-top rounded-circle">
        </a>
    </div>
</nav>
<!-- Navbar End -->


<!-- Video Modal Start -->
<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <!-- 16:9 aspect ratio -->
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Video Modal End -->