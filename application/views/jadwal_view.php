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
                        <h3 class="card-title">Jadwal Dokter</h3>
                    </div>
                    <div class="card-body">
            
            <a href="<?=base_url()?>jadwal/tambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Jadwal</a>

            <div class="my-3">
                <?php if($this->session->flashdata('message_sukses')): ?>
                    <div class="alert alert-success text-white">
                        <?=$this->session->userdata('message_sukses');?> 
                    </div>
                <?php endif ?>
            </div>

            <table class="table table-bordered table-striped table-sm" id="dataBasic2">
                  <thead>
                    <tr>
                      <th style="width: 7%" class="text-center">No</th>  
                      <th>Dokter</th>  
                      <th>Jadwal</th> 
                      <th style="width:20%;" class="text-center">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=0;
                    foreach($query as $rowjadwal){
                        $no++;
                        ?>
                    <tr>
                      <td class="text-center"><?=$no?></td>
                      <td><?=$rowjadwal->nama_dokter?></td>  
                      <td><?=$rowjadwal->jadwal?></td> 
                      <td class="text-center">

                        <a href="<?=base_url()?>jadwal/edit/?kode=<?=$rowjadwal->id_jadwal?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>

                        <a href="<?=base_url()?>jadwal/hapus/?kode=<?=$rowjadwal->id_jadwal?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin  ingin menghapus data jadwal ini ?')"><i class="fa fa-trash"></i> Hapus</a> 

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

<?php 
    $this->load->view('footer.php'); 
?>
 