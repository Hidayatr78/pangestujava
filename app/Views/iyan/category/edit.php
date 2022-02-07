<div class="card-body">
    <?php
    if (session()->getflashdata('pesan')) {
        echo '<div class="alert alert-warning" role="alert">';
        echo session()->getflashdata('pesan');
        echo '</div>';
    }
    ?>
    <!-- form start -->
    <form action="<?php echo base_url('iyan/category/edit/' . $kategori['nama_kategori']); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $kategori['id_kategori']; ?>">

        <!-- Valisadi Error -->
        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>
        <!-- End Validasi Error -->

        <div class="form-group">
            <label for="nama">Name Of Category</label>
            <input type="text" name="nama_kategori" class="form-control" id="nama" value="<?= $kategori['nama_kategori']; ?>" required>
        </div>

        <div class="form-group">
            <label for="skor">Order</label>
            <input type="number" min="1" max="100" name="urutan" class="form-control" id="urutan" value="<?= $kategori['urutan']; ?>" required>
        </div>

        <div class="box-footer">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
    <!-- End Form -->