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
    <form class="form-horizontal" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" name="id" value="<?= $konfigurasi['id_konfigurasi']; ?>">

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
            <label for="icon">Upload a New Icon</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" multiple name="icon[]" id="icon" name="icon" value="<?= $konfigurasi['icon'] ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="namaweb">Current Icon: </label>
            <div class="input-group">

                <img src="<?php echo base_url('/upload/image/config/' . $konfigurasi['icon']) ?>" class="img img-responsive img-thumbnail " width="150">

            </div>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>