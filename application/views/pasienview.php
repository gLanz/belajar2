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
                        <h3 class="card-title">Data pasien</h3>
                    </div>
                    <div class="card-body">

            <a href="<?=base_url()?>pasien/tambah" class="btn btn-success"><i class="fa fa-users"></i> Pendaftaran</a>


            <div class="col-12">
                <?php if($this->session->flashdata('message_sukses')): ?>
                    <div class="text-success">
                        <?=$this->session->userdata('message_sukses');?> 
                    </div>
                <?php endif ?>
            </div>

            <table class="table table-bordered mt-3">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>ID Pasien</th>
                      <th>Nama</th>
                      <th>Tanggal Lahir</th>
                      <th>No HP </th>
                      <th>Alamat</th>

                      <th style="width:20%;">Aksi</th>

                    </tr>
                  </thead>
                  <tbody>
                   <?php 
                    $no=0;
                    foreach($query as $rowpasien){
                        $no++;
                        ?> 
                    <tr>
                      <td><?=$no?></td>
                      <td><?=$rowpasien->id_pasien?></td>
                      <td><?=$rowpasien->nama_pasien?></td>
                      <td><?=$rowpasien->tgl_lahir?></td>
                      <td><?=$rowpasien->no_hp?></td>
                      <td><?=$rowpasien->alamat?></td> 

                      <td>
                        <a href="<?=base_url()?>pasien/edit/?kode=<?=$rowpasien->id_pasien?>" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</a>
                        <a href="<?=base_url()?>pasien/hapus/?kode=<?=$rowpasien->id_pasien?>" class="btn btn-danger"><i class="fa fa-trash"></i> Hapus</a> 
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
 