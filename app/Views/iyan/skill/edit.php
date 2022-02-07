<div class="card-body">
    <?php
    if (session()->getflashdata('pesan')) {
        echo '<div class="alert alert-warning" role="alert">';
        echo session()->getflashdata('pesan');
        echo '</div>';
    }
    ?>
    <!-- form start -->
    <form action="<?php echo base_url('iyan/skill/edit/' . $keahlian['nama_keahlian']); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $keahlian['id_keahlian']; ?>">

        <!-- Valisadi Error -->
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>
        <!-- End Validasi Error -->

        <div class="form-group">
            <label for="nama">Name Of Skill</label>
            <input type="text" name="nama_keahlian" class="form-control" id="nama" value="<?= $keahlian['nama_keahlian']; ?>" required>
        </div>

        <div class="form-group">
            <label>Level</label>
            <select class="custom-select" name="ahli">
                <option value="<?= $keahlian['ahli']; ?>"><?= $keahlian['ahli']; ?></option>
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Advanced">Advanced</option>
            </select>
        </div>

        <div class="form-group">
            <label>Color</label>
            <select class="custom-select" name="warna">
                <option value="<?= $keahlian['warna']; ?>">Sudah memilih</option>
                <option value="bg-primary">Blue</option>
                <option value="bg-danger">Red</option>
                <option value="bg-dark">Black</option>
                <option value="bg-info">Light Blue</option>
                <option value="bg-warning">Yellow</option>
                <option value="bg-purple">Purple</option>
            </select>
        </div>

        <div class="form-group">
            <label for="skor">Score Of Expertise</label>
            <input type="number" min="1" max="100" name="skor" class="form-control" id="skor" value="<?= $keahlian['skor']; ?>" required>
        </div>

        <div class="box-footer">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <!-- End Form -->