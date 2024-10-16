<!DOCTYPE html>
<html>
<head>
<title>Login</title>
</head>

<body>
<h2>Login</h2>
<form method="post" action="index.php?controller=auth&action=login">
<input type="text" name="username" placeholder="Username" required><br>
<input type="password" name="password" placeholder="Password" required><br>
<input type="submit" value="Login">
</form>
<?php if (isset($error)): ?>
<p><?php echo $error; ?></p>
<?php endif; ?>
<p>Don't have an account? <a href="index.php?controller=auth&action=register">Register
here</a></p>
</body>
</html>