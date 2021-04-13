<div class="card-body">
    <!-- form start -->
    <form action="<?php echo base_url('iyan/project/image/' . $project['id_project']); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">

        <?php if (isset($validation)) : ?>
            <div class="alert alert-danger" role="alert">
                <ul>
                    <?= $validation->listErrors(); ?>
                </ul>
            </div>
        <?php endif; ?>

        <div class="form-group">
            <label for="nama">Title Of Project</label>
            <input type="text" name="judul_gambar" class="form-control" id="judul_gambar" placeholder="Title Of Project" required>
        </div>

        <div class="form-group">
            <label for="gambar">Upload a New Picture</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" multiple name="gambar_project[]" name="gambar_project[]" required>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </div>
        </div>
    </form>

    <br>
    <hr>

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
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr class="text-center">
                <th>NO</th>
                <th>IMAGE</th>
                <th>TITLE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <tr class="text-center">
                <td>1</td>
                <td><img src="<?php echo base_url('upload/image/project/' . $project['gambar_project']) ?>" class="img img-responsive img-thumbnail" width="100px" height="100px"></td>
                <td><?php echo $project['nama_project'] ?></td>
                <td></td>
            </tr>
            <?php $no = 2;
            foreach ($gambar as $gambar) {
            ?>
                <tr class="text-center">
                    <td><?php echo $no ?></td>
                    <td>
                        <img src="<?php echo base_url('upload/image/project/thumbs/' . $gambar['gambar']) ?>" class="img img-responsive img-thumbnail" width="100px" height="100px">
                    </td>
                    <td><?= $gambar['judul_gambar'] ?></td>
                    <td>
                        <a href="<?php echo base_url('iyan/project/delete_gambar/' . $project['id_project'] . '/' . $gambar['id_gambar']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this data?')"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>