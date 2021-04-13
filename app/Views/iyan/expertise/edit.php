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
    <form action="<?php echo base_url('iyan/expertise/edit/' . $keahlian['deskripsi_keahlian']); ?>" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" name="id" value="<?= $keahlian['id_keahlian']; ?>">

        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?= $validation->listErrors(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="nama">Name Of Expertise</label>
            <input type="text" name="nama_keahlian" class="form-control" id="nama" placeholder="Name Of Expertise" value="<?= $keahlian['nama_keahlian']; ?>">
        </div>

        <div class="form-group">
            <label for="panggilan">Description Of Expertise</label>
            <input type="text" name="deskripsi" class="form-control" id="panggilan" placeholder="Description Of Expertise" value="<?= $keahlian['deskripsi_keahlian']; ?>">
        </div>

        <div class="form-group">
            <label for="gambar">Upload a New Picture</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" multiple name="gambar_keahlian[]" id="gambar" name="gambar_keahlian" value="<?php echo base_url('/upload/image/expertise/' . $keahlian['gambar_keahlian']) ?>"><?php echo base_url('/upload/image/expertise/' . $keahlian['gambar_keahlian']) ?></input>
                    <input type="hidden" name="2" multiple name="2[]" id="2" value="<?= $keahlian['gambar_keahlian']; ?>"">
                </div>
            </div>
        </div>

        <div class=" form-group">
                    <label for="gambar">Current Picture: </label>
                    <div class="input-group">
                        <img src="<?php echo base_url('/upload/image/expertise/' . $keahlian['gambar_keahlian']) ?>" class="img img-responsive img-thumbnail " width="150">
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
    </form>