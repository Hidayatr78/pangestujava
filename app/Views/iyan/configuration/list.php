<!-- Main content -->
<div class="card-body">
    <?php
    if (session()->getflashdata('pesan')) {
        echo '<div class="alert alert-warning" role="alert">';
        echo session()->getflashdata('pesan');
        echo '</div>';
    }
    ?>
    <?php
    //Form Open
    echo form_open('iyan/configuration/edit')
    ?>
    <div role="form">
        <input type="hidden" name="id" value="<?= $konfigurasi['id_konfigurasi']; ?>">

        <div class="form-group">
            <label for="namaweb">Website Name</label>
            <input type="text" name="namaweb" class="form-control" id="namaweb" placeholder="Website Name" value="<?= $konfigurasi['namaweb']; ?>">
        </div>

        <div class=" form-group">
            <label for="tagline">Motto/Tagline</label>
            <input type="text" class="form-control" name="tagline" id="tagline" placeholder="Motto/Tagline" value="<?= $konfigurasi['tagline']; ?>">
        </div>

        <div class=" form-group">
            <label for="website">Website</label>
            <input type="text" class="form-control" name="website" id="website" placeholder="Link Website" value="<?= $konfigurasi['website']; ?>">
        </div>

        <div class=" form-group">
            <label for="keywords">Keywords (For SEO Google)</label>
            <textarea name="keywords" class="form-control" id="keywords" placeholder="SEO Google"><?= $konfigurasi['keywords']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="metatext">Metatext</label>
            <textarea name="metatext" class="form-control" id="metatext" placeholder="Metatext"><?= $konfigurasi['metatext']; ?></textarea>
        </div>

        <div class="form-group">
            <label for="deskripsi">Description For Webiste</label>
            <textarea class="textarea form-control" name="deskripsi" id="deskripsi" placeholder="Description For Webiste"><?= $konfigurasi['deskripsi']; ?></textarea>
        </div>

        <div class="box-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
    <?php echo form_close() ?>