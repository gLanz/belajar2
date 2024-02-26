<?php 
    $this->load->view('header.php'); 
    $this->load->view('menu.php');
?>
 
<section class="content">
    <div class="container-fluid">
        <div class="row"> 
            <div class="col-md-12"> 
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Edit Petugas</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?=base_url()?>petugas/prosesedit" method="post">
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" id="nama" value="<?=$row->nama_petugas?>">
                                </div>

                                <input type="hidden" name="idpetugas" value="<?=$row->id_petugas?>">
                                <input type="hidden" name="idlogin" value="<?=$row->id_login?>">
                                <input type="hidden" name="old_password" value="<?=$row->password?>">

                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Jabatan</label>
                                <div class="col-sm-12 col-lg-6">
                                    <input type="text" class="form-control" name="jabatan" value="<?=$row->jabatan?>">
                                </div>
                            </div>
 

                            <div class="mb-3 row">
                                <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk" id="jk1" value="L" <?php if($row->jenis_kelamin=='L'){echo "checked";}?>>
                                  <label class="form-check-label" for="jk1">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="jk" id="jk2" value="P" <?php if($row->jenis_kelamin=='P'){echo "checked";}?>>
                                  <label class="form-check-label" for="jk2">Perempuan</label>
                                </div> 
                            </div>
 
 
                            <hr>
                            <div class="mb-3 row">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" id="username" value="<?=$row->username?>">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" autocomplete="off" id="password" value="<?=$row->password?>">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <button type="submit" class="btn btn-primary">Update</button> 
                            </div>
                        </form>

                        <div class="col-12">
                            <?php if($this->session->flashdata('message_error')): ?>
                                <div class="text-danger">
                                    <?=$this->session->userdata('message_error');?> 
                                </div>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
    $this->load->view('footer.php'); 
?>
