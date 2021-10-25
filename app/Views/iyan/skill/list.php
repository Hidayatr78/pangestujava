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
                <a href="<?php echo base_url('iyan/skill/add') ?>" class="btn btn-success btn-tumblr">
                    <i class="fa fa-plus"></i> Add
                </a>
            </button>
        </div>
        <thead>
            <tr class="text-center">
                <th>NO</th>
                <th>NAME OF SKILL</th>
                <th>LEVEL SKILL</th>
                <th>SCORE OF SKILL</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($keahlian as $keahlian) {
            ?>
                <tr class="text-center">
                    <td><?php echo $no ?></td>
                    <td><?= $keahlian['nama_keahlian'] ?></td>
                    <td><?= $keahlian['ahli'] ?></td>
                    <td><?= $keahlian['skor'] ?>%</td>
                    <td>
                        <a href="<?php echo base_url('iyan/skill/edit/' . $keahlian['nama_keahlian']) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                        <a href="<?php echo base_url('iyan/skill/delete/' . $keahlian['nama_keahlian']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this data?')"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
            <?php $no++;
            } ?>
        </tbody>
    </table>