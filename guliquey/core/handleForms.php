<?php 

require_once 'dbConfig.php'; 
require_once 'models.php';

if (isset($_POST['insertNewUserBtn'])) {
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$gender = trim($_POST['gender']);
	$age = trim($_POST['age']);
	$email = trim($_POST['email']);
	$dream_job = trim($_POST['dream_job']);

	if (!empty($firstName) && !empty($lastName) && !empty($gender) && !empty($age) && !empty($email)  && !empty($dream_job)) {
			$query = insertIntoUserRecords($pdo, $firstName, $lastName, 
			$gender, $age, $email, $dream_job);

		if ($query) {
			header("Location: ../index.php");
		}

		else {
			echo "Insertion failed";
		}
	}

	else {
		echo "Make sure that no fields are empty";
	}
	
}


if (isset($_POST['editUserBtn'])) {
	$user_id = $_GET['user_id'];
	$firstName = trim($_POST['firstName']);
	$lastName = trim($_POST['lastName']);
	$gender = trim($_POST['gender']);
	$age = trim($_POST['age']);
	$email = trim($_POST['email']);
	$dream_job = trim($_POST['dream_job']);

	if (!empty($user_id) && !empty($firstName) && !empty($lastName) && !empty($gender) && !empty($age) && !empty($email) && !empty($dream_job)) {

		$query = updateAUser($pdo, $user_id, $firstName, $lastName, $gender, $age, $email, $dream_job);

		if ($query) {
			header("Location: ../index.php");
		}
		else {
			echo "Update failed";
		}

	}

	else {
		echo "Make sure that no fields are empty";
	}

}





if (isset($_POST['deleteUserBtn'])) {

	$query = deleteAUser($pdo, $_GET['user_id']);

	if ($query) {
		header("Location: ../index.php");
	}
	else {
		echo "Deletion failed";
	}
}




?>