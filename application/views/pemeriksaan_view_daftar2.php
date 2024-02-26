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
                        <h3 class="card-title">Pendaftaran Imunisasi</h3>
                    </div>
                    <div class="card-body">

                        <?php if($this->session->flashdata('message_error')){?>
                            <div class="py-3">
                                <div class="alert alert-danger">
                                    <i class="icon fas fa-ban"></i> <?=$this->session->userdata('message_error');?> 
                                </div>
                            </div>
                        <?php }?>

                        <form action="<?=base_url()?>pemeriksaan/prosesdaftar2" method="post">
                            <input type="hidden" name="iddaftar" value="<?=$row->id_daftar?>">
                            <div class="mb-2 row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Balita</label>
                                <div class="col-sm-12 col-lg-6">
                                     <?=$row->nama_balita?>
                                </div>
                            </div>

                            <div class="mb-2 row">
                                <label class="col-sm-2 col-form-label">Tanggal Daftar</label>
                                <div class="col-sm-12 col-lg-6">
                                    <?=tglIndo($row->tgl_daftar)?>
                                </div>
                            </div>


                            <h5 class="mt-4">Data Pemeriksaan Balita</h5>
                            <hr>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tinggi badan saat ini</label>
                                <div class="col-sm-12 col-lg-6">
                                    <input type="text" class="form-control" name="tinggi">
                                    <small class="text-italic"><cite>dalam ukuran cm</cite></small>
                                </div>
                            </div>          

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Berat badan saat ini</label>
                                <div class="col-sm-12 col-lg-6">
                                    <input type="text" class="form-control" name="berat">
                                    <small class="text-italic"><cite>dalam ukuran kg</cite></small>
                                </div>
                            </div>  

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Keluhan/Catatan</label>
                                <div class="col-sm-12 col-lg-6">
                                    <textarea class="form-control" name="keluhan"><?=@$row->keluhan?></textarea>
                                </div>
                            </div>
                                                        

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Nomor Antrian</label>
                                <div class="col-sm-12 col-lg-6">
                                    <input type="text" class="form-control" name="noantri" value="<?=@$nomorantrian->noantri+1?>" readonly> 
                                </div>
                            </div>

                            
                            <div class="mb-3 row">
                                <button type="submit" class="btn btn-primary">Daftar</button> 
                            </div>
                        </form>

                         
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .select2-container .select2-selection--single{
        height: auto!important;
    }
</style>
<?php 
    $this->load->view('footer.php'); 
?>
