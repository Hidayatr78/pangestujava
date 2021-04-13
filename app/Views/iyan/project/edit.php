<div class="card-body">
    <!-- form start -->
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
    <form action="<?php echo base_url('iyan/project/edit/' . $project['deskripsi_project']); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" name="id" value="<?= $project['id_project']; ?>">

        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?= $validation->listErrors(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="nama">Name Of Project</label>
            <input type="text" name="nama_project" class="form-control" id="nama" placeholder="Name Of Project" value="<?= $project['nama_project']; ?>">
        </div>

        <div class="form-group">
            <label for="panggilan">Description Of Project</label>
            <input type="text" name="deskripsi" class="form-control" id="panggilan" placeholder="Description Of Project" value="<?= $project['deskripsi_project']; ?>">
        </div>

        <div class="form-group">
            <label for="gambar">Upload a New Picture</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" multiple name="gambar_project[]" id="gambar" name="gambar_project" value="<?php echo base_url('/upload/image/project/' . $project['gambar_project']) ?>">
                    <input type="hidden" name="2" multiple name="2[]" id="2" value="<?= $project['gambar_project']; ?>"">
                </div>
            </div>
        </div>

        <div class=" form-group">
                    <label for="gambar">Current Picture: </label>
                    <div class="input-group">
                        <img src="<?php echo base_url('/upload/image/project/' . $project['gambar_project']) ?>" class="img img-responsive img-thumbnail " width="150">
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
    </form>