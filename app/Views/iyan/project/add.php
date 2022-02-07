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
    <form action="<?php echo base_url('iyan/project/add'); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">

        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?= $validation->listErrors(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="nama">Name Of Project</label>
            <input type="text" name="nama_project" class="form-control" id="nama" placeholder="Name Of Project" required>
        </div>

        <div class="form-group">
            <label>Category</label>
            <select class="custom-select" name="id_kategori">
                <option value="">--Select Category--</option>
                <?php foreach ($kategori as $kategori) { ?>
                    <option value="<?= $kategori['id_kategori'] ?>"><?= $kategori['nama_kategori'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group">
            <label for="panggilan">Link Project</label>
            <input type="text" name="link_project" class="form-control" id="link" placeholder="Link Project" required>
        </div>

        <div class="form-group">
            <label for="gambar">Upload a New Picture</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" multiple name="gambar_project[]" id="gambar" name="gambar" required>
                </div>
            </div>
        </div>

        <div class="box-footer">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>