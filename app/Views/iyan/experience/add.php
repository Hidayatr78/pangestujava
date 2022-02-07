<div class="card-body">
       <?php
       if (session()->getflashdata('pesan')) {
              echo '<div class="alert alert-warning" role="alert">';
              echo session()->getflashdata('pesan');
              echo '</div>';
       }
       ?>
       <!-- form start -->
       <form action="<?php echo base_url('iyan/experience/add'); ?>" class="form-horizontal" method="post" enctype="multipart/form-data">

              <?php if (isset($validation)) : ?>
                     <div class="alert alert-danger" role="alert">
                            <ul>
                                   <?= $validation->listErrors(); ?>
                            </ul>
                     </div>
              <?php endif; ?>

              <div class="form-group">
                     <label for="institusi">Company Name</label>
                     <input type="text" name="institusi" class="form-control" id="institusi" placeholder="Company Name" required>
              </div>

              <div class="form-group">
                     <label for="bidang">Division</label>
                     <input type="text" name="bidang" class="form-control" id="bidang" placeholder="Your Division">
              </div>

              <div class="form-group">
                     <label for="tahun">Year</label>
                     <input type="text" name="tahun" class="form-control" id="tahun" placeholder="Year Of Entry and Exit" required>
              </div>

              <div class="form-group">
                     <label for="deskripsi">Description Of Experience</label>
                     <textarea class="textarea form-control" name="deskripsi" id="deskripsi" placeholder="Description For Experience"></textarea>
              </div>

              <div class="box-footer">
                     <button type="reset" class="btn btn-danger">Reset</button>
                     <button type="submit" class="btn btn-success">Submit</button>
              </div>
       </form>