<?php 
    $this->load->view('header.php'); 
    $this->load->view('menu.php');
?>
 
<section class="content">
    <div class="container-fluid">
        <div class="row"> 
            <div class="col-md-12">  
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card p-3">
                                 <h4 class="d-block">Selamat datang <?=$this->session->userdata('namasession');?></h4>
                                 <h5 class="d-block" style="font-size:16px;">Anda login sebagai <strong><?=getGroup($this->session->userdata('group'));?></strong>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-success">
                                    <i class="far fa-user"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Balita</span>
                                    <span class="info-box-number"><?=$rowbalita?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-warning">
                                    <i class="fas fa-user-nurse"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Petugas</span>
                                    <span class="info-box-number"><?=@$rowpetugas?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-info">
                                    <i class="fas fa-user-md"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Dokter</span>
                                    <span class="info-box-number"><?=@$rowdokter?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-primary">
                                    <i class="fas fa-list-ol"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Antrian</span>
                                    <span class="info-box-number"><?=@$rowantrian?></span>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="info-box">
                                <span class="info-box-icon bg-danger">
                                    <i class="fas fa-syringe"></i></span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Pemberian vaksin bulan ini</span>
                                    <span class="info-box-number"><?=@$rowvaksin?></span>
                                </div>
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
 