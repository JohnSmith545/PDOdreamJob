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
	<h3>Welcome to the User Management System. Input your details here to register</h3>
	<form action="core/handleForms.php" method="POST">
		<p><label for="firstName">First Name</label> <input type="text" name="firstName"></p>
		<p><label for="lastName">Last Name</label> <input type="text" name="lastName"></p>
		<p><label for="gender">Gender</label> <input type="text" name="gender"></p>
		<p><label for="age">Age</label> <input type="int" name="age"></p>
		<p><label for="email">Email</label> <input type="text" name="email"></p>
		<p><label for="dream_job">Dream Job</label> <input type="text" name="dream_job">
            <!-- <select name="dreamJob">
                <option value="software_engineer">Software Engineer</option>
                <option value="network_administrator">Network Administrator</option>
                <option value="database_administrator">Database Administrator</option>
            </select> -->
        </p>
			<input type="submit" name="insertNewUserBtn">
		</p>
	</form>

	<table style="width:50%; margin-top: 50px;">
	  <tr>
	    <th>User ID</th>
	    <th>First Name</th>
	    <th>Last Name</th>
	    <th>Gender</th>
	    <th>Age</th>
	    <th>Email</th>
	    <th>Dream Job</th>
	    <th>Date Added</th>
	    <th>Action</th>
	  </tr>

	  <?php $seeAllUserRecords = seeAllUserRecords($pdo); ?>
	  <?php foreach ($seeAllUserRecords as $row) { ?>
	  <tr>
	  	<td><?php echo $row['user_id']; ?></td>
	  	<td><?php echo $row['first_name']; ?></td>
	  	<td><?php echo $row['last_name']; ?></td>
	  	<td><?php echo $row['gender']; ?></td>
	  	<td><?php echo $row['age']; ?></td>
	  	<td><?php echo $row['email']; ?></td>
	  	<td><?php echo $row['dream_job']; ?></td>
	  	<td><?php echo $row['date_added']; ?></td>
	  	<td>
	  		<a href="edit_user.php?user_id=<?php echo $row['user_id'];?>">Edit</a>
	  		<a href="delete_user.php?user_id=<?php echo $row['user_id'];?>">Delete</a>
	  	</td>
	  </tr>
	  <?php } ?>
	</table>



</body>
</html>