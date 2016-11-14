<?php

class Gpio
{
	private $nr;
	private $colors;

	public function __construct( $colors )
	{
		$this->setColors($colors);
	}

	public function initial( $name )
	{
		$this->setNr( $this->colors[ $name ] );
	}

	public function setOn()
	{
		$comand = "gpio -g write " . $this->nr . " 1";
		shell_exec( $comand );
	}

	public function setOff()
	{
		$comand = "gpio -g write " . $this->nr . " 0";
		shell_exec( $comand );
	}

	public function getState()
	{
		$stan = [];

		foreach ($this->colors as $color=>$nr) {
			$stan[ $color ] = (int) shell_exec("gpio -g read " . (int) $nr );	
		}

		return $stan;
	}

	public function setMode()
	{
		foreach ($this->colors as $color=>$nr) {
			shell_exec("gpio -g mode " . (int) $nr . " out");
		}
	}

	private function setNr($nr)
	{
		$this->nr = (int) $nr;
	}

	private function setColors($colors)
	{
		$this->colors = $colors;
	}
}

?>