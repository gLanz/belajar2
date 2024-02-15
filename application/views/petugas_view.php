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
                        <h3 class="card-title">Data admin</h3>
                    </div>
                    <div class="card-body">
            
            <a href="<?=base_url()?>petugas/tambah" class="btn btn-success"><i class="fa fa-users"></i> Tambah Petugas</a>

            <div class="col-12 my-3">
                <?php if($this->session->flashdata('message_sukses')): ?>
                    <div class="text-success">
                        <?=$this->session->userdata('message_sukses');?> 
                    </div>
                <?php endif ?>
            </div>

            <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama</th>
                      <th>Username</th> 
                      <th>Jabatan</th> 
                      <th style="width:20%;">Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php 
                    $no=0;
                    foreach($query as $rowpetugas){
                        $no++;
                        ?>
                    <tr>
                      <td><?=$no?></td>
                      <td><?=$rowpetugas->nama?></td>
                      <td><?=$rowpetugas->username?></td> 
                      <td><?=$rowpetugas->jabatan?></td> 
                      <td>

                        <a href="<?=base_url()?>petugas/edit/?kode=<?=$rowpetugas->id_petugas?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>

                        <a href="<?=base_url()?>petugas/hapus/?kode=<?=$rowpetugas->id_petugas?>&kode2=<?=$rowpetugas->id_login?>" class="btn btn-danger" onclick="return confirm('Yakin  ingin menghapus petugas ini ?')"><i class="fa fa-trash"></i> Hapus</a> 

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
 