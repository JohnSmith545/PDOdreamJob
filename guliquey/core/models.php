<!-- Functions for interacting with the database -->

<?php 

require_once 'dbConfig.php';

function insertIntoUserRecords($pdo,$first_name, $last_name, $gender, $age, $email, $dream_job) {

	$sql = "INSERT INTO users (first_name,last_name,gender,age,email,dream_job) VALUES (?,?,?,?,?,?)";

	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, $age, 
		$email, $dream_job]);

	if ($executeQuery) {
		return true;	
	}
}

function seeAllUserRecords($pdo) {
	$sql = "SELECT * FROM users";
	$stmt = $pdo->prepare($sql);
	$executeQuery = $stmt->execute();
	if ($executeQuery) {
		return $stmt->fetchAll();
	}
}

function getUserByID($pdo, $user_id) {
	$sql = "SELECT * FROM users WHERE user_id = ?";
	$stmt = $pdo->prepare($sql);
	if ($stmt->execute([$user_id])) {
		return $stmt->fetch();
	}
}

function updateAUser($pdo, $user_id, $first_name, $last_name, 
	$gender, $age, $email, $dream_job) {

	$sql = "UPDATE users 
				SET first_name = ?, 
					last_name = ?, 
					gender = ?, 
					age = ?, 
					email = ?, 
					dream_job = ? 
			WHERE user_id = ?";
	$stmt = $pdo->prepare($sql);
	
	$executeQuery = $stmt->execute([$first_name, $last_name, $gender, 
		$age, $email, $dream_job, $user_id]);

	if ($executeQuery) {
		return true;
	}
}



function deleteAUser($pdo, $user_id) {

	$sql = "DELETE FROM users WHERE user_id = ?";
	$stmt = $pdo->prepare($sql);

	$executeQuery = $stmt->execute([$user_id]);

	if ($executeQuery) {
		return true;
	}

}




?>
