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
                        <h3 class="card-title">Pendaftaran pasien</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?=base_url()?>pasien/prosesdaftar" method="post">
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" id="nama">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-12 col-lg-6">
                                    <input type="date" class="form-control" name="tgllahir">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="hp" class="col-sm-2 col-form-label">Nomor Handphone</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="hp" id="hp">
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
                                <label for="jk" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="alamat" id="alamat"></textarea>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="alergi" class="col-sm-2 col-form-label">Alergi Obat</label> 
                                <div class="col-sm-12 col-lg-6">
                                    <select class="form-select form-control" name="alergi">
                                        <option selected>Pilih alergi obat</option>
                                        <?php foreach($qobat as $value){?>
                                            <option value="<?=$value->id_obat?>"><?=$value->nama_obat?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>
                            <hr>
                            <div class="mb-3 row">
                                <label for="username" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="username" id="username">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="password" class="col-sm-2 col-form-label">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" name="password" id="password">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <button type="submit" class="btn btn-primary">Simpan</button> 
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
