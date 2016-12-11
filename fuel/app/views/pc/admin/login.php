<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>管理システム</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
	<?php echo Asset::js('admin/login.js'); ?>
</head>
<body>
	<div>
		<form id="login_form" action="" method="post">
			<input type="text" name="login_id" id="login_id" value="<?php echo isset($login_id) ? $login_id : ''; ?>" />
			<input type="password" name="login_pw" id="login_pw" />
			<input type="submit" value="ログイン" />
			<p id="error_message"><?php echo isset($error_message) ? $error_message : ''; ?></p>
		</form>
	<div>
</body>
</html>
