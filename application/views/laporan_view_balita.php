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
                        <h3 class="card-title">Laporan Data Balita</h3>
                    </div>
                    <div class="card-body">
             
            <div class="my-3">
                <?php if($this->session->flashdata('message_sukses')): ?>
                    <div class="alert alert-success text-white">
                        <?=$this->session->userdata('message_sukses');?> 
                    </div>
                <?php endif ?>
            </div>

        <table class="table table-bordered table-striped mt-3 table-sm" id="dataBasic">
                  <thead>
                    <tr>
                      <th style="width: 10px" class="text-center">No</th>
                      <th>ID Balita</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Tanggal Lahir</th>
                      <th>Umur</th>
                      <th>Alamat</th> 
                      <th>Ayah</th> 
                      <th>Ibu</th> 
 
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
                      <td><?=$rowpasien->nama_ayah?></td> 
                      <td><?=$rowpasien->nama_ibu?></td> 

                      
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
 