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
                        <h3 class="card-title">Data Dokter</h3>
                    </div>
                    <div class="card-body">
             
            <div class="my-3">
                <?php if($this->session->flashdata('message_sukses')): ?>
                    <div class="alert alert-success text-white">
                        <?=$this->session->userdata('message_sukses');?> 
                    </div>
                <?php endif ?>
            </div>


            <a href="<?=base_url()?>laporan/balita" class="btn btn-default btn-block text-left pl-3">
                <i class="fas fa-chart-bar"></i> Laporan Data Balita
            </a>            

            <a href="<?=base_url()?>laporan/balitavaksin" class="btn btn-default btn-block text-left pl-3">
                <i class="fas fa-chart-bar"></i> Laporan Data Vaksin Balita
            </a>
            <a href="<?=base_url()?>laporan/vaksinbulanan" class="btn btn-default btn-block text-left pl-3 d-none">
                <i class="fas fa-chart-bar"></i> Laporan Data Balita di Vaksin Bulanan
            </a>

             
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php 
    $this->load->view('footer.php'); 
?>
 