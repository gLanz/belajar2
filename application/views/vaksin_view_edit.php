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
                        <h3 class="card-title">Edit Vaksin</h3>
                    </div>
                    <div class="card-body">
                        <form action="<?=base_url()?>vaksin/prosesedit" method="post">
                            <input type="hidden" name="idvaksin" value="<?=$row->id_vaksin?>">
                            <div class="mb-3 row">
                                <label for="nama" class="col-sm-2 col-form-label">Nama Vaksin</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" id="nama" value="<?=$row->nama_vaksin?>">
                                </div>
 

                            </div>

                             
                            <div class="mb-3 row">
                                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <textarea name="keterangan" class="form-control"><?=$row->keterangan?></textarea>
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
