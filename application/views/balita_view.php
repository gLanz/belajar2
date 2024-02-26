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
                        <h3 class="card-title">Data balita</h3>
                    </div>
                    <div class="card-body">

            <a href="<?=base_url()?>balita/tambah" class="btn btn-success"><i class="fa fa-users"></i> Tambah Balita</a>

            <?php if($this->session->flashdata('message_sukses')): ?>
                <div class="py-3">
                    <div class="alert alert-success">
                        <i class="icon fas fa-check"></i> <?=$this->session->userdata('message_sukses');?> 
                    </div>
                </div>
            <?php endif ?>
            <table class="table table-bordered table-striped mt-3 table-sm" id="dataBasic2">
                  <thead>
                    <tr>
                      <th style="width: 6%;" class="text-center">No</th>
                      <th>ID Balita</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Tanggal Lahir</th>
                      <th>Umur</th>
                      <th>Alamat</th>

                      <th style="width:25%;" class="text-center">Aksi</th>

                    </tr>
                  </thead>
                  <tbody>
                   <?php 
                    $no=0;
                    foreach($query as $rowpasien){
                        $no++;
                        ?> 
                    <tr>
                      <td class="text-center"><?=$no?></td>
                      <td>#<?=$rowpasien->id_balita?></td>
                      <td><?=$rowpasien->nama_balita?></td>
                      <td><?=getJK($rowpasien->jenkel_balita)?></td>
                      <td><?=tglIndo($rowpasien->tanggal_lahir)?></td>
                      <td><?=getHitungUmur2($rowpasien->tanggal_lahir)?></td>
                      <td><?=$rowpasien->alamat?></td> 

                      <td class="text-center">
                        <a href="<?=base_url()?>balita/edit/?kode=<?=$rowpasien->id_balita?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                        <a href="<?=base_url()?>balita/hapus/?kode=<?=$rowpasien->id_balita?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Hapus</a> 
                        <a href="<?=base_url()?>balita/detail/?kode=<?=$rowpasien->id_balita?>" class="btn btn-info btn-sm"><i class="fa fa-search"></i> Detail</a> 
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
 