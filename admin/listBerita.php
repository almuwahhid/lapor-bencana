<div class="row" style="padding-bottom: 10px">
  <ol class="breadcrumb">
    <li><a href="home.php">
      <em class="fa fa-home"></em>
    </a></li>
    <li class="active">Tampil Berita</li>
  </ol>
</div><!--/.row-->
<div class="col-lg-12">
   <table class="table table-bordered table-responsive" id="myTable">
       <thead>
           <tr>
             <td>
               Berita
             </td>
           </tr>
       <tbody>
           <?php
           include 'koneksi.php';
           $load = mysqli_query($koneksi, "SELECT b.*,a.nama_admin FROM berita b,admin a WHERE b.id_admin = a.id_admin ") or die(mysqli_error());
           while($data = mysqli_fetch_array($load)){
           ?>
           <tr>
             <td class="pointer">
               <div class="" onclick="window.location='home.php?page=editBerita&id=<?php echo $data[0]?>';">
                 oleh: <?php echo $data[9];?>
                 <div class="">
                    <b>
                       <font size="5">
                         <?php echo $data[3]?>
                       </font>
                    </b>
                 </div>
                 <div class="">
                   <div class="col-md-3">
                     dipublikasikan : <?php echo $data[5] ?>
                   </div>
                   <div class="col-md-3">
                     jam : <?php echo $data[6] ?>
                   </div>
                   <div class="col-md-3">
                     jam : <?php echo $data[7] ?>
                   </div>
                   <div class="col-md-3">
                     jam : <?php echo $data[8] ?>
                   </div>
                  </div>
               </div>
             </td>
           </tr>
           <?php
           }
           ?>
       </tbody>
       </thead>
   </table>
</div>
