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
                        <h3 class="card-title">Antrian Imunisasi</h3>
                    </div>
                    <div class="card-body"> 
                        <div class="col-12"> 
                              <table class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr> 
                                            <th>ID Daftar</th>
                                            <th>Tanggal Daftar</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Nomor Antri</th>
                                            <th style="width:18%;" class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            if(!empty($query2)){
                                            $no=0;
                                            foreach ($query2 as $resultcari) {
                                                $no++;
                                                ?>
                                                <tr> 
                                                    <td>#<?=$resultcari->id_daftar?></td>
                                                    <td><?=tglIndo($resultcari->tgl_daftar)?></td>
                                                    <td><?=$resultcari->nama_balita?></td>
                                                    <td><?=getJK($resultcari->jenis_kelamin)?></td>
                                                    <td><?=$resultcari->no_antrian?></td>
                                                    <td class="text-center">
                                                        <a href="<?=base_url()?>pemeriksaan/periksa/?kode=<?=$resultcari->id_daftar?>" class="btn btn-primary btn-sm    "><i class="fas fa-syringe"></i> Proses imunisasi</a>
                                                    </td>
                                                </tr>
                                            <?php }?>
                                            <?php }else{?>
                                                <tr><td colspan="6">Data antrian kosong</td></tr>
                                            <?php }?>
                                    </tbody>
                                </table> 
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
 