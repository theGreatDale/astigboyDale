<?php include 'myheader.php'; ?>  

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="./bootstrap-4.1.1-dist/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="./bootstrap-4.1.1-dist/css/bootstrap.min.css">
	<script type="text/javascript" src="../bootstrap-4.1.1-dist/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
	<style type="text/css">
		
		table{
    width: 50%;
    margin: 30px auto;
    border-collapse: collapse;
    text-align: left;
}
tr {
    border-bottom: 1px solid #cbcbcb;
}
th, td{
    border: none;
    height: 40px;
    padding: 2px;
}
tr:hover {
    background: #F5F5F5;
}

	</style>
</head>
<body>

<div class="header"style="margin-top:4%;padding-top:10px; width: 50%;background-color:#ffc04c">


	<h2>Rating</h2>

</div>

<div class="content">
	  
  	 <a href="index.php">Back</a>
<table class="table table-bordered" style="border: 1px solid black;">
  <thead>
    <tr style="letter-spacing: 1px">
      <th style="text-align: center;">Collector Name</th>
      <th style="text-align: center;">Restaurant</th>
      
      <th style="text-align: center;">Feedback</th>
      <th style="text-align: center;">Rating</th>
     
    </tr>
  </thead>
  <?php
  include 'connection.php';

  //CREATE CONNECTION
  $connection = new mysqli($HostName, $HostUser, $HostPassword, $DatabaseName);
  if ($connection->connect_error) {
      die('Connection Failed: '.$connection->connect_error);
  }
            $collector = $_GET['collectorname'];
            $query = mysqli_query($connection, "select * from tblrating where collectorname = '$collector'");

              if (mysqli_num_rows($query) == 0) {
                  echo '<tr><td align="center" colspan=7>No Records Found!</t></td>';
              }
              while ($row = mysqli_fetch_assoc($query)) {
                  ?>
                
<tr>
<td><?php echo $row['collectorname']; ?>
<td><?php echo $row['restaurant']; ?></td>
<td><?php echo $row['feedback']; ?></td>
<td><?php echo $row['rating']; ?></td>



<?php
              }
?>


</tr>
</table>


 
	
  






</div>
		
</body>
</html>
