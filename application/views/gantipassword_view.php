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
                        <h3 class="card-title">Ganti Password</h3>
                    </div>
                    <div class="card-body">
                        <?php echo $this->session->flashdata("pesan");?>
                        <form action="<?=base_url()?>login/submitpassword" method="post">
                             <table width="100%" class="table table-striped">

        <tr>
            <td width="20%">Password Lama</td>
            <td width="40%">
                <div class="col-xs-12">
                    <input type="password" name="oldpassword" required class="form-control" value="<?php echo isset($info['oldpass']) ? $info['oldpass'] : '' ?>">
                </div>
            </td>

        <tr><td>Password Baru </td>
            <td>
                <div class="col-xs-8">
                <input type="password" name="newpassword" class="form-control" required value="<?php echo isset($info['newpass']) ? $info['newpass'] : '' ?>">
                </div>
            </td>
        </tr>
        <tr><td>Konfirmasi Password Baru </td>
            <td>
                <div class="col-xs-8">
                <input type="password" name="cnewpassword" class="form-control" required value="<?php echo isset($info['cnewpass']) ? $info['cnewpass'] : '' ?>">
                </div>
            </td>
        </tr>

        </tr>
        <tr><td colspan="2">
        <br><button type="submit" class="btn btn-primary">Update</button>
        <a href="<?=base_url()?>home" class="btn btn-success">Kembali</a>
        </td></tr>
        </table>
                        </form>

                        <div class="col-12">
                            <?php if($this->session->flashdata('message_error')): ?>
                                <div class="alert alert-danger">
                                    <?=$this->session->userdata('message_error');?> 
                                </div>
                            <?php endif ?>
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
