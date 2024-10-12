<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		body {
			font-family: "Arial";
		}
		input {
			font-size: 1.5em;
			height: 50px;
			width: 200px;
		}
		table, th, td {
		  border:1px solid black;
		}
	</style>
</head>
<body>
	<?php $getUserById = getUserById($pdo, $_GET['user_id']); ?>
	<form action="core/handleForms.php?user_id=<?php echo $_GET['user_id']; ?>" method="POST">
		<p>
			<label for="firstName">First Name</label> 
			<input type="text" name="firstName" value="<?php echo $getUserById['first_name']; ?>">
		</p>
		<p>
			<label for="lastName">Last Name</label> 
			<input type="text" name="lastName" value="<?php echo $getUserById['last_name']; ?>">
		</p>
		<p>
			<label for="gender">Gender</label>
			<input type="text" name="gender" value="<?php echo $getUserById['gender']; ?>">
		</p>
		<p>
			<label for="age">Age</label>
			<input type="text" name="age" value="<?php echo $getUserById['age']; ?>">
		</p>
		<p>
			<label for="email">Email</label>
			<input type="text" name="email" value="<?php echo $getUserById['email']; ?>">
		</p>
		<p>
			<label for="dream_job">Dream Job</label>
			<input type="text" name="dream_job" value="<?php echo $getUserById['dream_job']; ?>">
        </p>
		<p>
			<input type="submit" name="editUserBtn">
		</p>
	</form>
</body>
</html>