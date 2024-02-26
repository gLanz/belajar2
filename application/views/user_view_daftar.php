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

                        <form action="<?=base_url()?>user/prosesdaftar" method="post">
                            <input type="hidden" value="<?=$rowbalita->id_balita?>" name="idbalita">
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tanggal Daftar</label>
                                <div class="col-sm-12 col-lg-6">
                                    <input type="date" class="form-control" name="tgldaftar">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Keluhan/Catatan</label>
                                <div class="col-sm-12 col-lg-6">
                                    <textarea class="form-control" name="keluhan"></textarea>
                                </div>
                            </div>

                            
                            <div class="mb-3 row">
                                <button type="submit" class="btn btn-primary">Daftar</button> 
                            </div>
                        </form>

                        
                        <h5>Riwayat Pendaftaran Imunisasi</h5>
                        <table class="table table-bordered table-striped table-sm" id="dataBasic">
                          <thead>
                            <tr>
                              <th style="width: 5%" class="text-center">No</th>
                              <th>Tanggal Daftar</th>
                              <th style="width:20%;" class="text-center">Status</th>
                              <th style="width:15%;" class="text-center">Aksi</th>

                          </tr>
                      </thead>
                      <tbody>
                        <?php 
                        $no=0;
                        foreach($rowdaftar as $rdaftar){
                            $no++;
                            ?>
                            <tr>
                              <td class="text-center"><?=$no?></td> 
                              <td><?=tglIndo($rdaftar->tgl_daftar)?></td> 
                              <td class="text-center"><?=$rdaftar->status?></td>  
                              <td class="text-center">
                                <?php if($rdaftar->status!='Batal'){?>
                                    <a href="<?=base_url()?>user/batal/?kode=<?=$rdaftar->id_daftar?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin  ingin membatalkan pendaftaran ini ?')"><i class="fas fa-window-close"></i> Batalkan</a>
                                <?php }?>
                              </td>  
                        </tr>

                    <?php }?>

                </tbody>
            </table>
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
