<div class="card-body">
    <?php
    if (session()->getflashdata('pesan')) {
        echo '<div class="alert alert-warning" role="alert">';
        echo session()->getflashdata('pesan');
        echo '</div>';
    }
    ?>
    <!-- form start -->
    <form action="<?php echo base_url('iyan/education/edit/' . $sekolah['deskripsi']); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_sekolah" value="<?= $sekolah['id_sekolah']; ?>">

        <div class="form-group">
            <label for="nama">School Name</label>
            <input type="text" name="nama_sekolah" class="form-control" id="nama_sekolah" placeholder="School Name" value="<?= $sekolah['nama_sekolah']; ?>" required>
        </div>

        <div class="form-group">
            <label for="jurusan">Majors</label>
            <input type="text" name="jurusan" class="form-control" id="jurusan" placeholder="Your Major" value="<?= $sekolah['jurusan']; ?>">
        </div>

        <div class="form-group">
            <label for="rata">Average Value</label>
            <input type="text" name="rata" class="form-control" id="rata" placeholder="Your Average Score" value="<?= $sekolah['rata']; ?>">
        </div>

        <div class="form-group">
            <label for="tahun">Year</label>
            <input type="text" name="tahun" class="form-control" id="tahun" placeholder="Year Of Entry and Exit" value="<?= $sekolah['tahun']; ?>" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Description Of Education</label>
            <input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="Description Of Education" value="<?= $sekolah['deskripsi']; ?>" required>
        </div>

        <div class="box-footer">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>