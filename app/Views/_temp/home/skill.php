<!-- Skills -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#004445" id="skill" fill-opacity="1" d="M0,128L48,122.7C96,117,192,107,288,112C384,117,480,139,576,154.7C672,171,768,181,864,160C960,139,1056,85,1152,80C1248,75,1344,117,1392,138.7L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
</svg>
<section id="skills" class="jumbotron">
    <div class="container">
        <div class="row text-center mb-5">
            <div class="col">
                <h2 id="nama">My Skills</h2>
            </div>
        </div>
        <div class="row justify-content-around">
            <?php foreach ($keahlian as $keahlian) { ?>
                <div class="col-md-3 mb-5">
                    <div class="card">
                        <img src="<?= base_url('/upload/image/expertise/' . $keahlian['gambar_keahlian']) ?>" class="card-img-top" alt="skill">
                        <div class="card-body">
                            <h5 class="card-title"><?= $keahlian['nama_keahlian']; ?></h5>
                            <p class="card-text"><?= $keahlian['deskripsi_keahlian']; ?></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#004445" id="project" fill-opacity="1" d="M0,160L40,149.3C80,139,160,117,240,117.3C320,117,400,139,480,176C560,213,640,267,720,256C800,245,880,171,960,133.3C1040,96,1120,96,1200,117.3C1280,139,1360,181,1400,202.7L1440,224L1440,0L1400,0C1360,0,1280,0,1200,0C1120,0,1040,0,960,0C880,0,800,0,720,0C640,0,560,0,480,0C400,0,320,0,240,0C160,0,80,0,40,0L0,0Z"></path>
</svg>
<!-- End Skills -->