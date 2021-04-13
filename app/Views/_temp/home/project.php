<!-- Project -->
<section class="project">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col">
                <h2>Project</h2>
            </div>
        </div>
        <div class="row justify-content-around">
            <?php foreach ($project as $project) { ?>
                <div class="col-md-3 mb-5">
                    <div class="card">
                        <img src="<?= base_url('/upload/image/expertise/' . $project['gambar_project']) ?>" class="card-img-top" alt="skill">
                        <div class="card-body">
                            <h5 class="card-title"><?= $project['nama_project']; ?></h5>
                            <p class="card-text"><?= $project['deskripsi_project']; ?></p>
                            <a href=" <?php echo base_url('project/' . $project['nama_project']) ?>" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<!-- End Project -->