<?php include 'myheader.php'; ?>	
<?php 
  session_start();

  if (!isset($_SESSION['type'])) {
      $_SESSION['msg'] = 'You must log in first';
      header('location: login.php');
  }

  if (isset($_GET['logout'])) {
      session_destroy();
      unset($_SESSION['username']);
      unset($_SESSION['type']);
      header('location: login.php');
  }

  $db = mysqli_connect('localhost', 'root', '', 'db_uberdispose');
?>

<!DOCTYPE html>
<html>


<head>

	<title>Home</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.1.1-dist/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.1.1-dist/css/bootstrap.min.css">
	<script type="text/javascript" src="jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="bootstrap-4.1.1-dist/js/bootstrap.min.js"></script>
</head>
<body>

<div class="header"style="margin-top:4%;padding-top:10px; width: 50%;background-color:#ffc04c">
	<h2>Home</h2>
	<?php echo $_SESSION['type'];
    ?>
</div>
<div class="content" style="width:50%">
		<!-- notification message -->
		
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
              echo $_SESSION['success'];
              unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif; ?>

		<!-- logged in user information -->
		<?php
            if ($_SESSION['type'] == 'Admin') {
                echo '<div class="content" align="center" style="width:90%">
				<table align= "center" >
		
				<tr align= "center" >
					<td>
						<a  href="adding.php">ADD COLLECTOR ACCOUNT</a>
					</td>
				</tr>

                <tr align= "center"> </tr>
				<tr align= "center"> </tr>
				<td><hr>
				<a  href="view_data.php">MANAGE COLLECTOR ACCOUNTS</a>
                </td>
                <tr align= "center"> 
				<tr align= "center"> 
				<td><hr>
				<a  href="viewrestorating.php">VIEW COLLECTOR RATINGS</a>
				</td>
                
                

				</tr>
                <tr align= "center"> 
				<td><hr>
				<a  href="index.php?logout="1"">LOGOUT</a>
				</td>
				
				</tr>

				</table>
				</div>';
            } elseif ($_SESSION['type'] == 'Collector') {
                echo  '<div class="content" align="center" >
				<table align= "center">

				<tr align= "center">
				<td>
					<a class="wadu" href=".php">MAKE SCHEDULE</a>
				</td>
				</tr>
				
				<tr align= "center"> 
				<td>
				<a class="wadu" href=".php">VIEW PATIENTS</a>
				</td>
				<tr align= "center"> 
				<td>
				<a class="wadu" href="index.php?logout="1"">LOGOUT</a>
				</td>
				
				</tr>
				
				
				</table>
				</div>';
            }
?>
    

	<?php
        if (isset($_GET['change_pw'])) {
            ?>
			<form class="form-group" id="form_changepass" action="change_pw.php?username=<?php echo $_GET['change_pw']; ?>" method="post">
				<label>Old Password</label>
				<br/>
				<input type="password" id="old_pw">
				<br/>
				<br/>
				<label>New Password</label>
				<br/>
				<input type="password" name="pw" id="new_pw1">
				<br/>
				<br/>
				<label>Re-enter New Password</label>
				<br/>
				<input type="password" id="new_pw2">
				<br/>
				<br/>
				<button class="btn btn-default" onclick="verify_submit('<?php echo $_GET['change_pw']; ?>');" type="button">Submit</button>
			</form>
			<center><a href="index.php">BACK</a></center>
			<?php
        }
        ?>




</div>
<script type="text/javascript">
	function verify_submit(username){
		var newpw1 = "", newpw2 = "";
		var old_pw = document.getElementById('old_pw').value;
		newpw1 = document.getElementById('new_pw1').value;
		newpw2 = document.getElementById('new_pw2').value;

		if ((newpw1==newpw2)&&(old_pw!="")) {
			$.ajax({
				url: 'change_pw',
				type: 'post',
				data: {
					mode: 'verify', pw: old_pw, username: username
				},
				success: function(result){
					if (result=='true') {
						document.getElementById('form_changepass').submit();
					}
					else {
						alert('Incorrect Old Password');
					}
				}
			});
			document.getElementById('form_changepass').submit();
		}
		else {
			if (old_pw=="") {
				alert('Please Provide Old Password');
			}
			else {
				alert('Password Mismatch');
			}
			
		}
	}
</script>

		
</body>
</html>