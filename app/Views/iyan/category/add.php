<div class="card-body">
    <?php
    if (session()->getflashdata('pesan')) {
        echo '<div class="alert alert-warning" role="alert">';
        echo session()->getflashdata('pesan');
        echo '</div>';
    }
    ?>
    <!-- form start -->
    <form action="<?php echo base_url('iyan/category/add'); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">

        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?= $validation->listErrors(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="nama">Name Of Category</label>
            <input type="text" name="nama_kategori" class="form-control" id="nama" placeholder="Name Of Category" required>
        </div>

        <div class="form-group">
            <label for="skor">Order</label>
            <input type="number" min="1" max="100" name="urutan" class="form-control" placeholder="Order" required>
        </div>

        <div class="box-footer">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>