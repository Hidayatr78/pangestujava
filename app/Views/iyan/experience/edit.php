<div class="card-body">
    <?php
    if (session()->getflashdata('pesan')) {
        echo '<div class="alert alert-warning" role="alert">';
        echo session()->getflashdata('pesan');
        echo '</div>';
    }
    ?>
    <!-- form start -->
    <form action="<?php echo base_url('iyan/experience/edit/' . $pengalaman['deskripsi']); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id_pengalaman" value="<?= $pengalaman['id_pengalaman']; ?>">

        <div class="form-group">
            <label for="institusi">Company Name</label>
            <input type="text" name="institusi" class="form-control" id="institusi" placeholder="School Name" value="<?= $pengalaman['institusi']; ?>" required>
        </div>

        <div class="form-group">
            <label for="bidang">Division</label>
            <input type="text" name="bidang" class="form-control" id="bidang" placeholder="Your Major" value="<?= $pengalaman['bidang']; ?>">
        </div>

        <div class="form-group">
            <label for="tahun">Year</label>
            <input type="text" name="tahun" class="form-control" id="tahun" placeholder="Year Of Entry and Exit" value="<?= $pengalaman['thn_masuk']; ?>" required>
        </div>

        <div class="form-group">
            <label for="deskripsi">Description Of Education</label>
            <input type="text" name="deskripsi" class="form-control" id="deskripsi" placeholder="Description Of Education" value="<?= $pengalaman['deskripsi']; ?>" required>
        </div>

        <div class="box-footer">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>