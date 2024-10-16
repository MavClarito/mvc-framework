<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
</head>
<body>
<h2>Welcome, <?php echo $_SESSION['user']; ?></h2>
<p><a href="index.php?controller=auth&action=logout">Logout</a></p>
</body>
</html>