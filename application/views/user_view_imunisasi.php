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
                        <h3 class="card-title">Data Balita</h3>
                    </div>
                    <div class="card-body">
                         
                        <div class="col-12"> 
                            <table class="table table-sm table-striped">
                                <tr><td colspan="2" class="table-title"><h4>Profil Balita</h4></td></tr>
                                <tr>
                                    <th class="w-25">ID</th>
                                    <th><?=$rowbalita->id_balita?></th>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <th><?=$rowbalita->nama_balita?></th> 
                                </tr>  
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <th><?=getJK($rowbalita->jenis_kelamin)?></th> 
                                </tr> 

                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <th><?=tglIndo($rowbalita->tanggal_lahir)?></th> 
                                </tr>  

                                <tr>
                                    <th>Umur</th>
                                    <th><?=getHitungUmur2($rowbalita->tanggal_lahir)?></th> 
                                </tr>   
                                 <tr>
                                    <th>Nama Ayah</th>
                                    <th><?=$rowbalita->nama_ayah?></th> 
                                </tr>   
                                                                  <tr>
                                    <th>Nama Ibu</th>
                                    <th><?=$rowbalita->nama_ibu?></th> 
                                </tr>   
                                 
                            </table> 
                        </div>
                        <hr>
                         
                        
                        
                       
                        <div class="col-12">
                             

                            <h5 class="mb-3 mt-2">Riwayat Vaksin Imunisasi</h5>
                            <table class="table table-sm table-striped">
                                <thead>
                                    <tr>
                                        <th style="width:5%;">No</th>
                                        <th style="width:15%;">Tanggal</th>
                                        <th>Vaksin</th>
                                        <th>Hasil Pemeriksaan</th>
                                        <th>Tindakan</th>
                                        <th>Dokter</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if(!empty($rowrekammedis)){
                                        $no=0;
                                        foreach ($rowrekammedis as $value) {$no++;?>
                                            <tr>
                                                <td><?=$no?></td>
                                                <td><?=tglIndo($value->tgl_vaksin)?></td>
                                                <td><?=$value->nama_vaksin?></td>
                                                <td>Tinggi badan: <?=$value->tinggi?>cm<br> Berat badan: <?=$value->berat?>kg</td>
                                                <td><?=$value->tindakan?></td>
                                                <td><?=$value->nama_dokter?></td>
                                            </tr>
                                        <?php }
                                        }else{?>
                                    <tr>
                                        <td colspan="6">Data riwayat vaksin belum ada</td>
                                    </tr>
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

<div class="modal fade" id="modalForm" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Vaksin</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="#" method="post" id="formData">
                    <input type="hidden" value="<?=$rowdaftar->id_balita?>" name="idbalita"> 
                    <input type="hidden" value="<?=$rowdaftar->id_daftar?>" name="iddaftar"> 

                    <div class="mb-2 row">
                        <label class="col-sm-12 col-form-label">Jenis Vaksin</label>
                        <div class="col-sm-12 col-lg-12">
                             <select class="form-select form-control" name="vaksin">
                                 <option value="">Pilih Vaksin</option>
                                 <?php foreach($rowvaksin as $rvaksin){?>
                                     <option value="<?=$rvaksin->id_vaksin?>"><?=$rvaksin->nama_vaksin?></option>
                                 <?php }?>
                             </select>
                        </div>
                    </div>                     

                    <div class="mb-2 row">
                        <label class="col-sm-12 col-form-label">Dokter</label>
                        <div class="col-sm-12 col-lg-12">
                             <select class="form-select form-control" id="dokter" name="dokter">
                                 <option value="">Pilih dokter</option>
                                 <?php foreach($rowdokter as $rdokter){?>
                                     <option value="<?=$rdokter->id_dokter?>"><?=$rdokter->nama_dokter?></option>
                                 <?php }?>
                             </select>
                        </div>
                    </div>                

                    <div class="mb-3 row">
                        <label class="col-sm-12 col-form-label">Tindakan</label>
                        <div class="col-sm-12 col-lg-12">
                            <textarea name="tindakan" id="tindakan" class="form-control"></textarea>
                        </div>
                    </div>
  
                </form>
                <div class="my-2">
                    <div class="alert alert-danger" id="pesan"></div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" id="btnSimpan" class="btn btn-primary">Simpan</button>
            </div>
        </div>

    </div> 
</div>

<script>
    var method;
    $(document).ready(function(){
        $("#pesan").hide();

        $("#dokter").on("change",function(){
            var value = $(this).val();
            if(value!=""){
                $("#tindakan").val("Pemberian vaksin");
            }else{
                $("#tindakan").val("");
            }
        })
    });
    $(".tambah").on("click",function(){
        method ='insert';
    });

    $("#btnSimpan").on("click",function(e){ 
        e.preventDefault(); 
        var url;
        if(method=="insert"){
            url = "<?php echo site_url('pemeriksaan/prosesTambah')?>";
        }else{
            url = "<?php echo site_url('pemeriksaan/prosesEdit')?>";
            $("#load-simpan").show();
        } 
        console.log(url);
        var formData = new FormData($('#formData')[0]); 
        $.ajax({
          url : url,
          type: "POST",
          data: formData,
          dataType: "json",
          processData : false,
          contentType : false,
          cache:false, 
          success: function(data){
            console.log(data);
            if(data.status == 'sukses'){ // Jika Statusnya = sukses
              $("#pesan-sukses").html(data.pesan).fadeIn().delay(3000).fadeOut(); 
                setTimeout(function(){// wait for 5 secs(2)
                    location.reload();
                }, 1000);
                $(".loading").hide();
            }else{ // Jika statusnya = gagal
              $("#pesan").html(data.pesan).show().delay(10000).fadeOut();; 
              $(".loading").hide();
          }
          console.log(data);
      },
      error: function (jqXHR, textStatus, errorThrown)
      {
        console.log(jqXHR,textStatus, errorThrown);
        $(".loading").hide();
    }
});
    })
</script>
<?php 
    $this->load->view('footer.php'); 
?>
 