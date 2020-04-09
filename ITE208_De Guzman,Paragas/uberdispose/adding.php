<?php include 'myheader.php'; ?>  

<!DOCTYPE html>
<html>  
<head>

	<title>Add Account</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.1.1-dist/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.1.1-dist/css/bootstrap.min.css">
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
</head>
<body>
<div class="header"style="margin-top:4%;padding-top:10px; width: 50%;background-color:#ffc04c">
<h2>Register a Collector</h2>
  </div>
	<script type="text/javascript">
										    function ShowHideDiv(chk,divID) {
										        var txtbox = document.getElementById(divID);
										        txtbox.style.display = chk.checked ? "block" : "none";

										        
										    }
										    </script>
  <form method="post" action="add.php">
  	
  	<div >

    <a href='index.php'>Back</a>
    <div class="input-group">
  	  <label>Username:</label>
  	  <input type="text" name="txtusername" required = "required">
    </div>
    <div class="input-group">
  	  <label>Password:</label>
  	  <input type="password" name="txtpassword" required = "required"></div>
    </div class="input-group">
    <div class="input-group">
  	  <label>Collector's Name:</label>
  	  <input type="text" name="txtcollector" required = "required">
    </div>
  
  	<div class="input-group">
  	  <label>Owner's Name:</label>
  	  <input type="text" name="txtowner" required = "required">
    </div>

    <div class="input-group">
  	  <label>Location:</label>
  	  <input type="text" name="txtlocation" required = "required">
    </div>
    <div class="3u 12u$(small)">
											
											    <input type="checkbox" id="chk1" onclick="ShowHideDiv(this,'txtbox1')" />
											    <label for="chk1">Tin Number</label>
												
											<div id="txtbox1" style="display: none">
                      <div class="input-group">
											    <input type="text" id="tinnum" name="txttinnum" placeholder="TIN Number" required = "required"/><br>
                      </div>
											</div>
											</div>
											<div class="3u 12u$(small)">
											
											    <input type="checkbox" id="chk2" onclick="ShowHideDiv(this,'txtbox2')" />
											    <label for="chk2">B.I.R</label>
											
											<div id="txtbox2" style="display: none">
                      <div class="input-group">
											    <input type="text" id="bir" name="txtbir" placeholder="B.I.R" required = "required"/><br>
                      </div>
											</div>
											</div>
											<div class="3u 12u$(small)">
											
											    <input type="checkbox" id="chk3" onclick="ShowHideDiv(this,'txtbox3')" />
											    <label for="chk3">Brgy Clearance</label>
												
                      <div id="txtbox3" style="display: none">
                      <div class="input-group">
                          <input type="text" id="bir" name="txtlocation" placeholder="Location" required = "required"/>
                      </div>
											    <br>

											</div>
    <div>
    <label class="input-group">Mission:</label>
    <textarea name="txtmission" placeholder="Mission" rows="5" cols="10" style="resize: none;width: 100%;font-size: 20px" required = "required"></textarea>
</div>
<div>
    <label class="input-group">Vision:</label>
    <textarea name="txtvision" placeholder="Vision" rows="5" cols="10" style="resize: none;width: 100%;font-size: 20px" required = "required"></textarea>
</div>
     
   
   
  

   
  	<div >
  	  <button type="submit" class="btn" name="submit">SUBMIT</button>
		</div>
		
  	<p>
  	
  	</p>
  </form>
</body>
</html>
