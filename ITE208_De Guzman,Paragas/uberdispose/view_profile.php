<?php include 'myheader.php'; ?>  
<?php
  include 'connection.php';

  //CREATE CONNECTION
  $connection = new mysqli($HostName, $HostUser, $HostPassword, $DatabaseName);
  if ($connection->connect_error) {
      die('Connection Failed: '.$connection->connect_error);
  }?>
<!DOCTYPE html>
<html>  
<head>
  <title>Profile

  </title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
 <div class="header"style="margin-top:4%;padding-top:10px; width: 50%;background-color:#ffc04c">
<h2>  </h2>
  </div>
    <?php 

    if (isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $record = mysqli_query($connection, "SELECT * FROM tblcollectors WHERE id = '$id'");
        $n = mysqli_fetch_array($record);

        $mission = $n['mission'];
        $vision = $n['vision'];
        $collectorname = $n['collectorname'];
        $status = $n['status'];
        $location = $n['location'];
        $owner = $n['owner'];
        $bir = $n['bir'];
        $barangay = $n['barangay'];
        $tin = $n['tin'];

        $record2 = mysqli_query($connection, "SELECT * FROM tblusers WHERE owner = '$owner'");
        $n2 = mysqli_fetch_array($record2);

        $username = $n2['username'];
        $password = $n2['password'];
    }

    ?>
  <form method="post" action="edit.php">
    <a href='index.php'>Back</a>
    
    	<div class="input-group">

      <input type="hidden" name="id" value="<?php echo $id; ?>">
  	 
  	  <label>Username:</label>
  	  <input type="text" name="txtusername" required = "required" value="<?php echo $username; ?>">
      </div>
      
      <div class="input-group">


  	  <label>Password:</label>
  	  <input type="password" name="txtpassword" required = "required" value="<?php echo $password; ?>">
      </div>
      <div class="input-group">


  	  <label>Collector Name:</label>
  	  <input type="text" name="txtcollectorname" required = "required" value="<?php echo $collectorname; ?>">
      </div>
      <div class="input-group">


  	  <label>Owner:</label>
  	  <input type="text" name="txtowner" required = "required" value="<?php echo $owner; ?>">
      </div>
      <div class="input-group">


  	  <label>Location:</label>
  	  <input type="text" name="txtlocation" required = "required" value="<?php echo $location; ?>">
      </div>
      <div class="input-group">


  	  <label>Mission:</label>
  	  <input type="text" name="txtmission" required = "required" value="<?php echo $mission; ?>">
      </div>

      <div class="input-group">
  	  <label>Vision:</label>
  	  <input type="text" name="txtvision" required = "required" value="<?php echo $vision; ?>">
      </div>

      <div class="input-group">
  	  <label>BIR:</label><br>
      </div>
      <div class="input-group">
      <label></label><br>
      <input type="number" name="txtbir" required = "required" value="<?php echo $bir; ?>">
      </div>
     
      <div class="input-group">
  	  <label>TIN:</label>
      </div>
      <div class="input-group">
      <label></label>
      <input type="number" name="txttin" required = "required" value="<?php echo $tin; ?>">
      </div>

      <div class="input-group">
  	  <label> Barangay Clearance:</label>
  	  <input type="text" name="txtbarangay" required = "required" value="<?php echo $barangay; ?>">
      </div>
      
  <div class="input-group">
         <button type="submit" class="btn" name="edit">EDIT</button>
        <a href="delete.php?delete=<?php echo $id; ?>" class="btn">DELETE</a>
		</div>
		
  	<p>
  	
  	</p>
  </form>
</body>
</html>
