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
        <input type="hidden" name="id" name="id" value="<?= $biodata['id_biodata']; ?>">

        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors(); ?>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="panggilan">Nick Name (Call)</label>
            <input type="text" name="panggilan" class="form-control" id="panggilan" placeholder="Nick Name (Call)" value="<?= $biodata['panggilan']; ?>">
        </div>

        <div class="form-group">
            <label for="about">About Me</label>
            <textarea class="textarea form-control" name="about" id="about" placeholder="About Me"><?= $biodata['saya']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" class="form-control" id="email" placeholder="Email" value="<?= $biodata['email']; ?>">
        </div>

        <div class="form-group">
            <label for="telpon">Telephone</label>
            <input type="number" name="telpon" class="form-control" id="telpon" placeholder="Telephone" value="<?= $biodata['telpon']; ?>">
        </div>

        <div class="form-group">
            <label for="alamat">Address</label>
            <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Address" value="<?= $biodata['alamat']; ?>">
        </div>

        <div class="form-group">
            <label for="fb">Facebook</label>
            <input type="text" name="fb" class="form-control" id="fb" placeholder="Facebook" value="<?= $biodata['fb']; ?>">
        </div>

        <div class="form-group">
            <label for="ig">Instagram</label>
            <input type="text" name="ig" class="form-control" id="ig" placeholder="Instagram" value="<?= $biodata['ig']; ?>">
        </div>

        <div class="form-group">
            <label for="linked">Linked</label>
            <input type="text" name="linked" class="form-control" id="linked" placeholder="Linked" value="<?= $biodata['linked']; ?>">
        </div>

        <div class="form-group">
            <label for="github">Github</label>
            <input type="text" name="github" class="form-control" id="github" placeholder="Github" value="<?= $biodata['github']; ?>">
        </div>

        <div class="form-group">
            <label for="gambar">Upload a New Picture</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" multiple name="gambar[]" id="gambar" name="gambar" value="<?= $biodata['gambar'] ?>">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="gambar">Current Picture: </label>
            <div class="input-group">
                <img src="<?= base_url('/upload/image/bio/' . $biodata['gambar']) ?>" class="img img-responsive img-thumbnail " width="150">
            </div>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-success">Submit</button>
        </div>
    </form>