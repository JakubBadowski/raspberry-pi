<?php 

$colors = [
	'yellow' => 26,
	'blue' => 20,
	'green' => 19,
	'red' => 16
];

require('Gpio.php');

if( $_SERVER['REQUEST_METHOD'] === 'POST' ) {

	// sprawdzaj stan na początku
	if (isset($_POST['check_state'])) {

		$gpio = new Gpio($colors);
		$stan = $gpio->getState();

		header('Content-Type: application/json');
		echo json_encode(['stan' => $stan]);
		exit();
	}

	if ( isset($_POST['state'] ) && (int) $_POST['state'] === 1 ) {
		// $stan = 1;
		$name = $_POST['name'];

		$gpio = new Gpio( $colors );
		$gpio->initial( $name );
		$gpio->setOn();

	} else {
		// $stan = 0;
		$name = $_POST['name'];

		$gpio = new Gpio( $colors );
		$gpio->initial( $name );
		$gpio->setOff();
	}

} else {
	exit("nie z nami te numery...");
}

 ?>