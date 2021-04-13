<!-- /.card-header -->
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
    <table id="example1" class="table table-bordered table-striped">
        <div class="box-tools pull-right text-right">
            <button type=" button" class="btn btn-box-tool" data-widget="add">
                <a href="<?php echo base_url('iyan/project/add') ?>" class="btn btn-success btn-tumblr">
                    <i class="fa fa-plus"></i> Add
                </a>
            </button>
        </div>
        <thead>
            <tr class="text-center">
                <th>NO</th>
                <th>NAME OF PROJECT</th>
                <th>DESCRIPTION OF PROJECT</th>
                <th>IMAGE OF PROJECT</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($project as $project) {
            ?>
                <tr class="text-center">
                    <td><?php echo $no ?></td>
                    <td><?= $project['nama_project'] ?></td>
                    <td><?= $project['deskripsi_project'] ?></td>
                    <td>
                        <img src="<?php echo base_url('upload/image/project/' . $project['gambar_project']) ?>" class="img img-responsive img-thumbnail te" width="100 px" height="100 px">
                    </td>
                    <td>
                        <a href="<?php echo base_url('iyan/project/image/' . $project['id_project']) ?>" class="btn btn-warning btn-xs"><i class="fa fa-image"></i> Image</a>
                        <a href="<?php echo base_url('iyan/project/edit/' . $project['deskripsi_project']) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                        <a href="<?php echo base_url('iyan/project/delete/' . $project['deskripsi_project'] . '/' . $project['id_project']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this data?')"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>