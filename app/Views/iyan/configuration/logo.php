<!-- Main content -->
<div class="card-body">
    <?php
    if (session()->getflashdata('pesan')) {
        echo '<div class="alert alert-warning" role="alert">';
        echo session()->getflashdata('pesan');
        echo '</div>';
    }
    ?>
    <!-- form start -->
    <?php echo form_open_multipart('iyan/configuration/ubah') ?>
    <div class="form-horizontal" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" name="id" value="<?= $konfigurasi['id_konfigurasi']; ?>">

        <?php
        $errors = session()->getflashdata('errors');
        if (!empty($errors)) { ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?php foreach ($errors as $key => $value) { ?>
                        <li> <?= esc($value) ?></li>
                    <?php } ?>
                </ul>
            </div>
        <?php } ?>

        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="namaweb">Website Name</label>
            <input type="text" name="namaweb" class="form-control" id="namaweb" placeholder="Website Name" value="<?= $konfigurasi['namaweb']; ?>" readonly>
        </div>

        <div class="form-group">
            <label for="logo">Upload a New Logo</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" multiple name="logo[]" id="logo" name="logo[]" value="<?= $konfigurasi['logo']; ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="logo">Current Logo: </label>
            <div class="input-group">
                <img src="<?php echo base_url('/upload/image/config/' . $konfigurasi['logo']) ?>" class="img img-responsive img-thumbnail " width="150">
            </div>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </div>
    <?php echo form_close() ?>