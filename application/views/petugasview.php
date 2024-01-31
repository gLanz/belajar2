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

            <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">No</th>
                      <th>Nama</th>
                      <th>Username</th>
                      <th style="width: 40px">Password</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1.</td>
                      <td>Administrator</td>
                      <td>admin</td>
                      <td>pasw1223</td>
                    </tr>
                    <tr>
                      <td>2.</td>
                      <td>Budi</td>
                      <td>budi</td>
                      <td>12345</td>
                    </tr>
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
 