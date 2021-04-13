<div class="card-body">
    <?php
    if (session()->getflashdata('pesan')) {
        echo '<div class="alert alert-warning" role="alert">';
        echo session()->getflashdata('pesan');
        echo '</div>';
    }
    ?>
    <?php
    if (session()->getflashdata('sukses')) {
        echo '<div class="alert alert-success" role="alert">';
        echo session()->getflashdata('sukses');
        echo '</div>';
    }
    ?>
    <!-- form start -->
    <form action="<?php echo base_url('iyan/expertise/add'); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">

        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?= $validation->listErrors(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="nama">Name Of Expertise</label>
            <input type="text" name="nama_keahlian" class="form-control" id="nama" placeholder="Name Of Expertise" required>
        </div>

        <div class="form-group">
            <label for="panggilan">Description Of Expertise</label>
            <input type="text" name="deskripsi" class="form-control" id="panggilan" placeholder="Description Of Expertise" required>
        </div>

        <div class="form-group">
            <label for="gambar">Upload a New Picture</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" multiple name="gambar_keahlian[]" id="gambar" name="gambar" required>
                </div>
            </div>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="reset" class="btn btn-danger">Reset</button>
        </div>
    </form>