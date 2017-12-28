<?php
session_start();
$_SESSION['username_admin']=$_SESSION['username_admin'];
if($_SESSION['username_admin']==""){
  ?>
  <script type="text/javascript">
  window.location.href = "login.php";
  </script>
  <?php
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Dashboard</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="css/dataTables.bootstrap.css" rel="stylesheet">
	<script src="//cdn.ckeditor.com/4.8.0/full/ckeditor.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyAyvzGrCrvUNEA_ofNFVfXOeHUje8XGW-A"></script>

	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>

	<?php include "include/header.php"; ?>

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<?php
    if(isset($_GET['page'])){
      if ($_GET['page']=="berita") {
  			include 'listBerita.php';
  		}elseif ($_GET['page']=="tambahBerita") {
  			include 'tambahBerita.php';
  		}elseif ($_GET['page']=="tambahLokasi") {
  			include 'tambahMarker.php';
  		}elseif ($_GET['page']=="lokasi") {
  			echo "lokasi";
  		}elseif ($_GET['page']=="editBerita") {
  			include 'editBerita.php';
  		}
    }else{
      ?>
      <div class="row" style="padding-bottom: 10px">
        <ol class="breadcrumb">
          <li><a href="home.php">
            <em class="fa fa-home"></em>
          </a></li>
          <li class="active">Home</li>
        </ol>
        <div class="col-md-12" style="margin-top:200px;">
          <h1 style="text-align:center">SELAMAT DATANG DI HALAMAN ADMIN</h1>
        </div>
      </div><!--/.row-->
      <?php
      }
      ?>
	</div>	<!--/.main-->

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>


  <script src="servicejs/map.js"></script>
	<script src="js/jquery.dataTables.js"></script>
	<script  src="js/dataTables.bootstrap.js"></script>
	<script type="text/javascript">
	            $(function (){
	                $("#myTable").dataTable();
	            });
              documennt.getElementById("latitude").value = "dfd";
	</script>

	<script>
		window.onload = function () {
	var chart1 = document.getElementById("line-chart").getContext("2d");
	window.myLine = new Chart(chart1).Line(lineChartData, {
	responsive: true,
	scaleLineColor: "rgba(0,0,0,.2)",
	scaleGridLineColor: "rgba(0,0,0,.05)",
	scaleFontColor: "#c5c7cc"
	 });
  };
	</script>

</body>
</html>
