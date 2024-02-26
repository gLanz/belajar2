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

                        <form action="<?=base_url()?>pemeriksaan/prosesdaftar" method="post">
                            
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Balita</label>
                                <div class="col-sm-12 col-lg-6">
                                    <select class="form-select form-control basic-select" name="balita">
                                        <option value="">Pilih Balita</option>
                                        <?php foreach($rowbalita as $rbalita){?>
                                            <option value="<?=$rbalita->id_balita?>"><?=$rbalita->nama_balita?></option>
                                        <?php }?>
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tanggal Daftar</label>
                                <div class="col-sm-12 col-lg-6">
                                    <input type="date" class="form-control" name="tgldaftar">
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
                                    <textarea class="form-control" name="keluhan"></textarea>
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
