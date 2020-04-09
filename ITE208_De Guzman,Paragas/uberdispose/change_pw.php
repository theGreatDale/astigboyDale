<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>


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
      </body>
</html>