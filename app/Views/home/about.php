<!-- About Start -->
<div class="container-fluid py-5" id="about">
    <div class="container">
        <div class="position-relative d-flex align-items-center justify-content-center">
            <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">About</h1>
            <h1 class="position-absolute text-uppercase text-primary">About Me</h1>
        </div>
        <div class="row align-items-center">
            <div class="col-lg-5 pb-4 pb-lg-0">
                <img class="img-fluid rounded w-100" src="<?= base_url('/upload/image/bio/' . $biodata['gambar']) ?>" alt="">
            </div>
            <div class="col-lg-7">
                <h3 class="mb-4"><?= $biodata['ahli']; ?></h3>
                <p><?= $biodata['saya']; ?></p>
                <div class="row mb-3">
                    <div class="col-sm-6 py-2">
                        <h6>Name: <span class="text-secondary"><?= $biodata['nama']; ?></span></h6>
                    </div>
                    <div class="col-sm-6 py-2">
                        <h6>You can call me: <span class="text-secondary"><?= $biodata['panggilan']; ?></span></h6>
                    </div>
                    <div class="col-sm-6 py-2">
                        <h6>Birthday: <span class="text-secondary">07 November 1999</span></h6>
                    </div>
                    <div class="col-sm-6 py-2">
                        <h6>Degree: <span class="text-secondary">Colleger</span></h6>
                    </div>
                    <div class="col-sm-6 py-2">
                        <h6>Phone: <span class="text-secondary"><?= $biodata['telpon']; ?></span></h6>
                    </div>
                    <div class="col-sm-6 py-2">
                        <h6>Email: <span class="text-secondary"><?= $biodata['email']; ?></span></h6>
                    </div>
                    <div class="col-sm-6 py-2">
                        <h6>Address: <span class="text-secondary"><?= $biodata['alamat']; ?></span></h6>
                    </div>
                    <div class="col-sm-6 py-2">
                        <h6>Freelance: <span class="text-secondary">Available</span></h6>
                    </div>
                </div>
                <a href="" class="btn btn-outline-primary mr-4">Hire Me</a>
                <a href="" class="btn btn-outline-primary">Learn More</a>
            </div>
        </div>
    </div>
</div>
<!-- About End -->