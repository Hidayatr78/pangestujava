<!-- /.card-header -->
<div class="card-body">

       <!-- Pesan Jika Sukses Upload -->
       <?php
       if (session()->getflashdata('pesan')) {
              echo '<div class="alert alert-warning" role="alert">';
              echo session()->getflashdata('pesan');
              echo '</div>';
       }
       ?>
       <!-- End Pesan Jika Sukses -->

       <!-- All Tampilan Keahlian -->
       <table id="example1" class="table table-bordered table-striped">
              <div class="box-tools pull-right text-right">
                     <button type=" button" class="btn btn-box-tool" data-widget="add">
                            <a href="<?php echo base_url('iyan/category/add') ?>" class="btn btn-success btn-tumblr">
                                   <i class="fa fa-plus"></i> Add
                            </a>
                     </button>
              </div>
              <thead>
                     <tr class="text-center">
                            <th>NO</th>
                            <th>NAME OF CATEGORY</th>
                            <th>ORDER</th>
                            <th>ACTION</th>
                     </tr>
              </thead>
              <tbody>
                     <!-- Lopping data kategori -->
                     <?php $no = 1;
                     foreach ($kategori as $kategori) {
                     ?>
                            <tr class="text-center">
                                   <td><?php echo $no ?></td>
                                   <td><?= $kategori['nama_kategori'] ?></td>
                                   <td><?= $kategori['urutan'] ?></td>
                                   <td>
                                          <a href="<?php echo base_url('iyan/category/edit/' . $kategori['nama_kategori']) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                          <a href="<?php echo base_url('iyan/category/delete/' . $kategori['nama_kategori']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this data?')"><i class="fa fa-trash"></i> Delete</a>
                                   </td>
                            </tr>
                     <?php $no++;
                     } ?>
                     <!-- End Looping -->
              </tbody>
       </table>
       <!-- End Tampilan Keahlian -->