
<!DOCTYPE html>
<html>  
<head>
  <title>Olivar
  </title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
  <div class="header"><h2>TALENT</h2>
  </div>
	
  <form method="post" action="addrestaurant.php">
  	
  	<div >

    <a href='index.php'>Back</a>
    <div >
  	  <label>Username:</label>
  	  <input type="text" name="txtusername" required = "required">
    </div>
    <div >
  	  <label>Password:</label>
  	  <input type="password" name="txtpassword" required = "required">
    </div>
  	  <label>Restaurant's Name:</label>
  	  <input type="text" name="txtrestaurant" required = "required">
    </div>
  
  	<div >
  	  <label>Owner's Name:</label>
  	  <input type="text" name="txtowner" required = "required">
    </div>

    <div >
  	  <label>Location:</label>
  	  <input type="text" name="txtlocation" required = "required">
    </div>
     
   
   
  

   
  	<div >
  	  <button type="submit" class="btn" name="submit">SUBMIT</button>
		</div>
		
  	<p>
  	
  	</p>
  </form>
</body>
</html>
