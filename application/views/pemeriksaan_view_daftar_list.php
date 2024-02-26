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
                        <h3 class="card-title">Daftar Antrian Imunisasi</h3>
                    </div>
                    <div class="card-body">
             
            <div class="my-3">
                <?php if($this->session->flashdata('message_sukses')): ?>
                    <div class="alert alert-success">
                        <?=$this->session->userdata('message_sukses');?> 
                    </div>
                <?php endif ?>

                <?php if($this->session->flashdata('message_error')): ?>
                    <div class="alert alert-danger">
                        <?=$this->session->userdata('message_error');?> 
                    </div>
                <?php endif ?>
            </div>

            <a href="<?=base_url()?>pemeriksaan/daftar" class="btn btn-success"> <i class="fas fa-hand-holding-medical"></i> Tambah antrian
                                </a>

            <table class="table table-sm table-striped mt-3">
                <thead>
                    <tr>
                        <th style="width:5%;">No</th>
                        <th style="width:15%;">Tanggal Daftar</th>
                        <th>Nama Balita</th>
                        <th style="width:15%;">Nomor Antrian</th>
                        <th style="width:15%;">Status</th>
                        <th style="width:15%;">Aksi</th> 
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($rowdaftar)){
                        $no=0;
                        foreach ($rowdaftar as $value) {$no++;?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=tglIndo($value->tgl_daftar)?></td>
                                <td><?=$value->nama_balita?></td>
                                <td><?=$value->no_antrian?></td>
                                <td><?=$value->status?></td>
                                 
                                <td>
                                    <?php if($value->status=='Daftar'){?>
                                        <a href="<?=base_url()?>pemeriksaan/daftar2/?kode=<?=$value->id_daftar?>" class="btn btn-primary btn-sm">Proses antrian</a>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php }
                    }else{?>
                        <tr>
                            <td colspan="5">Data pendaftaran belum ada</td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
 
            </div>
        </div>
    </div>
</section>

<?php 
    $this->load->view('footer.php'); 
?>
 