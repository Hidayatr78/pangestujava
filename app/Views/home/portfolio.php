<!-- Portfolio Start -->
<div class="container-fluid pt-5 pb-3" id="portfolio">
    <div class="container">
        <div class="position-relative d-flex align-items-center justify-content-center">
            <h1 class="display-1 text-uppercase text-white" style="-webkit-text-stroke: 1px #dee2e6;">Gallery</h1>
            <h1 class="position-absolute text-uppercase text-primary">My Portfolio</h1>
        </div>
        <div class="row">
            <div class="col-12 text-center mb-2">
                <ul class="list-inline mb-4" id="portfolio-flters">
                    <li class="btn btn-sm btn-outline-primary m-1 active" data-filter="*">All</li>
                    <?php foreach ($project as $project1) { ?>
                        <li class="btn btn-sm btn-outline-primary m-1" data-filter=".<?= $project1['id_kategori'] ?>"><?= $project1['nama_kategori'] ?></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
        <div class="row portfolio-container">
            <?php foreach ($project as $project) { ?>
                <div class="col-lg-4 col-md-6 mb-4 portfolio-item <?= $project['id_kategori'] ?>">
                    <div class="position-relative overflow-hidden mb-2">
                        <img class="img-fluid rounded w-100" src="<?php echo base_url('upload/image/project/' . $project['gambar_project']) ?>" alt="">
                        <div class="portfolio-btn bg-primary d-flex align-items-center justify-content-around">
                            <a href="<?= $project['link_project'] ?>">
                                <i class="fa fa-link text-white" style="font-size: 30px;"></i>
                            </a>
                            <a href="<?php echo base_url('upload/image/project/' . $project['gambar_project']) ?>" data-lightbox="portfolio">
                                <i class="fa fa-plus text-white" style="font-size: 30px;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- Portfolio End -->