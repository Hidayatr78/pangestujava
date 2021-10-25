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
    <form action="<?php echo base_url('iyan/skill/add'); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">

        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?= $validation->listErrors(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="nama">Name Of Skill</label>
            <input type="text" name="nama_keahlian" class="form-control" id="nama" placeholder="Name Of Skill" required>
        </div>

        <div class="form-group">
            <label for="ahli">Level</label>
            <input type="text" name="ahli" class="form-control" id="ahli" placeholder="Grade Of Skill" required>
        </div>

        <div class="form-group">
            <label for="skor">Score Of Expertise</label>
            <input type="text" name="skor" class="form-control" id="skor" placeholder="Score Of Skill" required>
        </div>

        <div class="box-footer">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>