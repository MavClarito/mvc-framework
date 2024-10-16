<!DOCTYPE html>
<html>
<head>
<title>Register</title>
</head>
<body>
<h2>Register</h2>
<form method="post" action="index.php?controller=auth&action=register">
<input type="text" name="username" placeholder="Username" required><br>
<input type="password" name="password" placeholder="Password" required><br>
<input type="submit" value="Register">

</form>
<?php if (isset($error)): ?>
<p><?php echo $error; ?></p>
<?php endif; ?>
<p>Already have an account? <a href="index.php?controller=auth&action=login">Login here</a></p>
</body>
</html>