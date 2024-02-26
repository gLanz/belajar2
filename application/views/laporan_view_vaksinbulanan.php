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
                        <h3 class="card-title">Laporan Data Vaksin Balita</h3>
                    </div>
                    <div class="card-body">
             
            <div class="my-3">
                <?php if($this->session->flashdata('message_sukses')): ?>
                    <div class="alert alert-success text-white">
                        <?=$this->session->userdata('message_sukses');?> 
                    </div>
                <?php endif ?>
            </div>
            <form action="<?=base_url()?>laporan/" autocomplete="off">
                <div class="row">
                    <div class="form-group col-12 col-lg-3">
                        <label>Pilih bulan</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="text" class="form-control date-month">
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 d-none">
                        <button class="btn btn-success" id="mybtn">Tampilkan</button>
                    </div>
                </div>
            </form>

        <table class="table table-bordered table-striped mt-3 table-sm" id="dataBasic">
                  <thead>
                    <tr>
                      <th style="width: 10px" class="text-center">No</th>
                      <th>ID Balita</th>
                      <th>Nama</th>
                      <th>Jenis Kelamin</th>
                      <th>Tanggal Lahir</th>
                      <th>Umur</th>
                      <th>Vaksin</th>
 
                    </tr>
                  </thead>
                  <tbody>
                   <?php 
                    $no=0;
                    foreach($query as $rowbalita){
                        $no++;
                        $idbalita = $rowbalita->id_balita;
                        $vaksin = $this->db->query("SELECT a.id_balita,a.id_vaksin, b.nama_vaksin FROM tbl_imunisasi a LEFT JOIN tbl_vaksin b ON a.id_vaksin=b.id_vaksin WHERE id_balita='$idbalita'")->result();
                        ?> 
                    <tr>
                      <td class="text-center"><?=$no?></td>
                      <td>#<?=$rowbalita->id_balita?></td>
                      <td><?=$rowbalita->nama_balita?></td>
                      <td><?=getJK($rowbalita->jenkel_balita)?></td>
                      <td><?=tglIndo($rowbalita->tanggal_lahir)?></td>
                      <td><?=getHitungUmur2($rowbalita->tanggal_lahir)?></td>
                      <td>
                        <?php foreach($vaksin as $rv){?>
                            - <?=$rv->nama_vaksin?><br>
                        <?php } ?>
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
<script>
 

    $(function() {
       $(".auto_submit_item").change(function(e) {
          $("#mybtn").trigger("click");
      });
   });
</script>
<?php 
    $this->load->view('footer.php'); 
?>
 