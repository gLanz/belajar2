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
                        <h3 class="card-title">Tambah Jadwal</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?=base_url()?>jadwal/prosestambah" method="post">

                            <div class="mb-2 row">
                                <label class="col-sm-12 col-form-label">Dokter</label>
                                <div class="col-sm-12 col-lg-12">
                                     <select class="form-select form-control" id="dokter" name="dokter">
                                         <option value="">Pilih dokter</option>
                                         <?php foreach($rowdokter as $rdokter){?>
                                             <option value="<?=$rdokter->id_dokter?>"><?=$rdokter->nama_dokter?></option>
                                         <?php }?>
                                     </select>
                                </div>
                            </div>    

                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-12 col-form-label">Nama</label>
                                <div class="col-sm-12">
                                    <textarea name="jadwal" class="form-control summernote" id="jadwal"></textarea>
                                </div>
                            </div>
 
                              

                            <div class="mb-3">
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
