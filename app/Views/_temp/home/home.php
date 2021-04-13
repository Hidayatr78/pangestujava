<!-- Home -->
<section class="jumbotron text-center home">
    <img src="<?= base_url('/upload/image/bio/' . $biodata['gambar']) ?>" alt="<?= $biodata['nama']; ?>" width="200" class="rounded-circle img-thumbnail">
    <h1 class="display-4"><?= $biodata['nama']; ?></h1>
    <p class="lead"><?= $biodata['ahli']; ?></p>
    <?php
    if (session()->getflashdata('pesan')) {
        echo '<div class="alert alert-warning" role="alert">';
        echo session()->getflashdata('pesan');
        echo '</div>';
    }
    ?>
</section>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="mb-5">
    <path fill="#004445" fill-opacity="1" d="M0,128L48,122.7C96,117,192,107,288,112C384,117,480,139,576,154.7C672,171,768,181,864,160C960,139,1056,85,1152,80C1248,75,1344,117,1392,138.7L1440,160L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
</svg>
<!-- End Home -->