<div class="register-logo">
    <a href="<?= base_url() ?>/admin1/index2.html"><b><?= $nama ?></b><?= $nama2 ?></a>
</div>
<div class="card">
    <div class="card-body register-card-body">
        <p class="login-box-msg"><?= $jenis ?></p>
        <form class="form-horizontal" method="post" enctype="multipart/form-data">
            <!-- <input type="hidden" name="id"> -->
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
            <?php if (isset($validation)) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= $validation->listErrors(); ?>
                </div>
            <?php endif; ?>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Full Name" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fa fa-user-md"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" name="lahir" id="lahir" data-target="#reservationdate" required data-target="#reservationdate" data-toggle="datetimepicker" placeholder="MM/DD/YYYY">
                    <div class="input-group-append">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="file" class="form-control" multiple name="gambar[]" id="gambar" name="gambar" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fa fa-image"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <img src="<?= base_url() ?>/upload/image/default.jpeg" id="imgView" class="img img-responsive img-thumbnail" width="100" height="100">
            </div>
            <div class="row">
                <div class="col-8">
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                </div>
                <!-- /.col -->
            </div>
        </form>
        <a href="<?= base_url('iyan/login') ?>" class="text-center">I already have a membership</a>
    </div>
    <!-- /.form-box -->