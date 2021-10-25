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
                            <a href="<?php echo base_url('iyan/education/add') ?>" class="btn btn-success btn-tumblr">
                                   <i class="fa fa-plus"></i> Add
                            </a>
                     </button>
              </div>
              <thead>
                     <tr class="text-center">
                            <th>NO</th>
                            <th>SCHOOL NAME</th>
                            <th>MAJORS</th>
                            <th>AVERAGE VALUE</th>
                            <th>ACTION</th>
                     </tr>
              </thead>
              <tbody>
                     <?php $no = 1;
                     foreach ($sekolah as $sekolah) {
                     ?>
                            <tr class="text-center">
                                   <td><?php echo $no ?></td>
                                   <td><?= $sekolah['nama_sekolah'] ?></td>
                                   <td><?= $sekolah['jurusan'] ?></td>
                                   <td><?= $sekolah['rata'] ?></td>
                                   <td>
                                          <a href="<?php echo base_url('iyan/education/edit/' . $sekolah['deskripsi']) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                          <a href="<?php echo base_url('iyan/education/delete/' . $sekolah['deskripsi']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this data?')"><i class="fa fa-trash"></i> Delete</a>
                                   </td>
                            </tr>
                     <?php $no++;
                     } ?>
              </tbody>
       </table>