<?php
    $firstName = $_POST['name'];
	$lastName = $_POST['phone'];
	$gender = $_POST['email'];
	$email = $_POST['address'];
	$car_options = implode(", ", $_POST['car_options']);

	// Database connection
	$conn = new mysqli('localhost','root','','project');

	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into users (name, phone, email, address, car_options) values (?, ?, ?, ?, ?)");
		$stmt->bind_param("sssss", $name, $phone, $email, $address, $car_options);
		$execval = $stmt->execute();
		echo $execval;
		echo "Registration successfully...";
		$stmt->close();
		$conn->close();
	}
?>
