<!-- Main content -->
<div class="card-body">
       <?php
       if (session()->getflashdata('pesan')) {
              echo '<div class="alert alert-warning" role="alert">';
              echo session()->getflashdata('pesan');
              echo '</div>';
       }
       ?>
       <!-- form start -->
       <?php echo form_open_multipart('iyan/biodata/about') ?>
       <form class="form-horizontal" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" name="id" value="<?= $biodata['id_biodata']; ?>">

              <?php if (isset($validation)) : ?>
                     <div class="alert alert-danger" role="alert">
                            <?= $validation->listErrors(); ?>
                     </div>
              <?php endif; ?>

              <div class="form-group">
                     <label for="nama">Name</label>
                     <input type="text" name="nama" class="form-control" id="nama" placeholder="Name" value="<?= $biodata['nama']; ?>">
              </div>

              <div class="form-group">
                     <label for="ahli">SKill</label>
                     <input type="text" name="ahli" class="form-control" id="ahli" placeholder="Expertise" value="<?= $biodata['ahli']; ?>">
              </div>

              <div class="form-group">
                     <label for="link">Link</label>
                     <input type="text" name="link" class="form-control" id="link" placeholder="Link" value="<?= $biodata['link']; ?>">
              </div>

              <div class="form-group">
                     <label for="profil">Upload a New Picture</label>
                     <div class="input-group">
                            <div class="custom-file">
                                   <input type="file" multiple name="profil[]" id="profil" name="profil" value="<?= $biodata['profil'] ?>">
                            </div>
                     </div>
              </div>

              <div class="form-group">
                     <label for="profil">Current Picture: </label>
                     <div class="input-group">
                            <img src="<?= base_url('/upload/image/bio/' . $biodata['profil']) ?>" class="img img-responsive img-thumbnail " width="150">
                     </div>
              </div>

              <div class="box-footer">
                     <button type="submit" class="btn btn-success">Submit</button>
              </div>
       </form>
       <?php echo form_close() ?>