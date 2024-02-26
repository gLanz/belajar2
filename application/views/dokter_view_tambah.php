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
                        <h3 class="card-title">Tambah Dokter</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?=base_url()?>dokter/prosestambah" method="post">
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" id="nama">
                                </div>
                            </div>
 
                            <div class="mb-3 row">
                                <label for="hp" class="col-sm-2 col-form-label">Spesialisasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="spesialisasi" id="spesialisasi">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="jk" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="jk" id="jk1" value="L">
                                  <label class="form-check-label" for="jk1">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                  <input class="form-check-input" type="radio" name="jk" id="jk2" value="P">
                                  <label class="form-check-label" for="jk2">Perempuan</label>
                                </div> 
                            </div>

                              
                            <div class="mb-3 row">
                                <label for="hp" class="col-sm-2 col-form-label">Nomor Handphone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="no_hp" id="no_hp">
                                </div>
                            </div>
 

                            <div class="mb-3 row">
                                <button type="submit" class="btn btn-primary">Simpan</button> 
                            </div>
                        </form>

                        <div class="col-12">
                            <?php if($this->session->flashdata('message_error')): ?>
                                <div class="alert alert-danger">
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
