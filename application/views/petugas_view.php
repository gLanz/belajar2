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
                        <h3 class="card-title">Data Petugas</h3>
                    </div>
                    <div class="card-body">
            
            <a href="<?=base_url()?>petugas/tambah" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Petugas</a>

            <div class="my-3">
                <?php if($this->session->flashdata('message_sukses')): ?>
                    <div class="alert alert-success">
                        <?=$this->session->userdata('message_sukses');?> 
                    </div>
                <?php endif ?>
            </div>

            <div class="my-3">
                <?php if($this->session->flashdata('message_error')): ?>
                    <div class="alert alert-success">
                        <?=$this->session->userdata('message_error');?> 
                    </div>
                <?php endif ?>
            </div>

            <table class="table table-bordered table-striped table-sm" id="dataBasic2">
                  <thead>
                    <tr>
                      <th class="text-center" style="width: 10px">No</th>
                      <th>Nama</th>
                      <th>Username</th> 
                      <th>Jenis Kelamin</th> 
                      <th>Jabatan</th> 
                      <th class="text-center" style="width:20%;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=0;
                    foreach($query as $rowpetugas){
                        $no++;
                        ?>
                    <tr>
                      <td class="text-center"><?=$no?></td>
                      <td><?=$rowpetugas->nama_petugas?></td>
                      <td><?=$rowpetugas->username?></td> 
                      <td><?=getJK($rowpetugas->jenis_kelamin)?></td> 
                      <td><?=$rowpetugas->jabatan?></td> 
                      <td class="text-center">

                        <a href="<?=base_url()?>petugas/edit/?kode=<?=$rowpetugas->id_petugas?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>

                        <a href="<?=base_url()?>petugas/hapus/?kode=<?=$rowpetugas->id_petugas?>&kode2=<?=$rowpetugas->id_login?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin  ingin menghapus petugas ini ?')"><i class="fa fa-trash"></i> Hapus</a> 

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
 