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
            <label>Level</label>
            <select class="custom-select" name="ahli">
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Advanced">Advanced</option>
            </select>
        </div>

        <div class="form-group">
            <label>Color</label>
            <select class="custom-select" name="warna">
                <option value="bg-primary">Blue</option>
                <option value="bg-danger">Red</option>
                <option value="bg-dark">Black</option>
                <option value="bg-info">Blue</option>
                <option value="bg-warning">Yellow</option>
                <option value="bg-purple">Purple</option>
            </select>
        </div>

        <div class="form-group">
            <label for="skor">Score Of Expertise</label>
            <input type="number" min="1" max="100" name="skor" class="form-control" id="skor" placeholder="Beginner(40), Intermediate(75), Advanced(90)" required>
        </div>

        <div class="box-footer">
            <button type="reset" class="btn btn-danger">Reset</button>
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>