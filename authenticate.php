<?php
session_start();
header( "Content-type: application/json" );

//vallidations
function validation() 
{
	$valid = true;
	if ( !isset($_POST['username'], $_POST['password']) ) 
	{
		$valid = false;
		$jsonReplay = array('message' => 'Please fill both the username and password fields!');
		echo json_encode($jsonReplay);
	}
	elseif (!preg_match("/^(?=[a-zA-Z0-9._]{3,20}$)(?!.*[_.]{2})[^_.].*[^_.]$/",$_POST['username']))
	{
		$valid = false;
		$jsonReplay = array('message' => 'username just contains characters, numbers , underscore(_) and dot(.)');
		echo json_encode($jsonReplay);
	}
	return $valid;
}

if(validation() && !isset($_SESSION['loggedin']) && !isset($_SESSION['name']))
{
	$api_url = 'https://nilepromotion.com/pa-test/wp-json/test/v2/creds?username='. $_POST['username'] .'&password='. $_POST['password'] ;

	// // Read JSON file
	// $json_data = file_get_contents($api_url);

	// echo $json_data;
	// // Decode JSON data into PHP array
	// $response_data = json_decode($json_data);
	// echo $response_data->login;

	$ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $api_url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    $response_data = curl_exec ($ch);
    curl_close ($ch); 
    //echo $response_data;
    $response_data = json_decode($response_data);


	if($response_data->login == "successful")
	{
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $response_data->username;


	    $jsonReplay = array('message' => 'Loggedin');
	    echo json_encode($jsonReplay);
	}
	else
	{
		$jsonReplay = array('message' => 'username or password is wrong');
		echo json_encode($jsonReplay);
	}

 
}




?>