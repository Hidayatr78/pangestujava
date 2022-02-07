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
              </div>
              <thead>
                     <tr class="text-center">
                            <th>NO</th>
                            <th>NAME</th>
                            <th>Email</th>
                            <th>MESSAGE</th>
                            <th>ACTION</th>
                     </tr>
              </thead>
              <tbody>
                     <!-- Lopping data kontak -->
                     <?php $no = 1;
                     foreach ($kontak as $kontak) {
                     ?>
                            <tr class="text-center">
                                   <td><?php echo $no ?></td>
                                   <td><?= $kontak['nama'] ?></td>
                                   <td><?= $kontak['email'] ?></td>
                                   <td><?= $kontak['pesan'] ?></td>
                                   <td>
                                          <a href="<?php echo base_url('iyan/contact/delete/' . $kontak['id_kontak']) ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this data?')"><i class="fa fa-trash"></i> Delete</a>
                                   </td>
                            </tr>
                     <?php $no++;
                     } ?>
                     <!-- End Looping -->
              </tbody>
       </table>
       <!-- End Tampilan Keahlian -->