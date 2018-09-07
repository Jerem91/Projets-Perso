<?php

class Game
{
	public $players;

	function __construct()
	{
		$this->players = [];
	}

	public function Initialize()
	{
		array_push( $this->players, new Fighter("Knight", 1) );
		array_push( $this->players, new Fighter("Dragon", 0) );
	}

	public function Run()
	{
		while( $this->players[0]->life > 0 && $this->players[1]->life > 0 )
	    {
	        rand() > 0.5 ? $this->players[0]->Attack() : $this->players[1]->Attack();
	    }
	}
}

class Fighter
{
	public $type;
	public $life;

	public $weapon;
	public $armor;

	public $target;

	function __construct( $type, $target )
	{

		$this->type = $type;
	    $this->life = rand(1, 100);

	    $this->weapon = new Equipement( "Weapon", rand( 1,10 ) );
	    $this->armor = new Equipement( "Armor", rand( 1,10 ) );

	    $this->target = $target;
	}

	public function Attack()
	{
		global $game;

    	$game->players[ $this->target ]->life -= $this->weapon->effect - $game->players[ $this->target ]->armor->effect;

  
	}
}


class Equipement
{
	public $name;
	public $effect;

	function __construct( $name, $effect )
	{
		$this->name = $name;
	    $this->effect = $effect;
	}
}



$game = new Game();
$game->Initialize();
$game->Run();


var_dump( $game );