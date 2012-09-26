<?php
class Suit {

	public $suit;
	public $index;
	public $symbol;
	function __construct($suitstr, $firstletter, $idx) 
	{
		$this->suit = $suitstr;
		$this->index = $idx;
		$this->symbol = $firstletter;
	}
}
class Rank {

	public $face;
	public $value_n;
	public $value_28;
	public $index;
	function __construct($namestr, $val, $offset, $val_28) 
	{
		$this->value_28 = $val_28;
		$this->index = $offset;
		$this->face = $namestr;
		$this->value = $val;
	}
}

class Card {

	public $suit;
	public $rank;
	public $index;
	function __construct($suitobj, $rankobj, $CARDPERSUIT=13) 
	{
		$this->suit = $suitobj;
		$this->rank = $rankobj;
		$this->index = ($suitobj->index * $CARDPERSUIT) + $rankobj->index;
	}
	
}

class Player {
	public $cardset;
	public $player_name;
	public $player_id;
	function __construct($name, $id) 
	{
		$this->player_name = $name;
		$this->player_id = $id;
		$this->cardset = array();
		//print "Player:$name with ID:$id joined";
	}
	public function addToPlayerHand($card)
	{
		array_push($this->cardset, $card);
	}	
	public function removefromPlayerHand($card)
	{
		$index=array_search($card, $this->cardset);
		if ($index)
			unset($this->cardset[$index]);
	}
	public function arrayToStr()
	{
		$str="";
		foreach($this->cardset as $k)
		{
			$str= $str.$k->index." ";
		}
		return $str;
	}
	public function printCardIndices()
	{
		print "Player:$this->player_name and ID:$this->player_id \n";
		foreach($this->cardset as $k)
		{
			print $k->index;
			print " ";
		}
		print "\n";
	}
}
class Deck {

	public $cardArr = array();
	public $suitArr = array();
	public $rankArr = array();
	public static $CLUBS ;
	public static $DIAMONDS;
	public static $HEARTS;
	public static $SPADES;
	public static $TOTAL;
	public static $CARDPERSUIT;
	function __construct() 
	{
		$TOTAL=52;
		$CARDPERSUIT=13;

		$CLUBS = new Suit( "Clubs", "c" , 0);
		array_push($this->suitArr, $CLUBS);
		$DIAMONDS = new Suit( "Diamonds", "d" , 1);
		array_push($this->suitArr, $DIAMONDS);
		$HEARTS = new Suit( "Hearts", "h" , 2);
		array_push($this->suitArr, $HEARTS);
		$SPADES = new Suit( "Spades", "s", 3);
		array_push($this->suitArr, $SPADES);

		$ACE = new Rank( "Ace", "a" , 0, 1);
		$TWO = new Rank( "Two", "2" , 1, 10);
		$THREE = new Rank( "Three", "3", 2, 5);
		$FOUR = new Rank( "Four", "4" , 3, 0);
		$FIVE = new Rank( "Five", "5" , 4, 0);
		$SIX = new Rank( "Six", "6" , 5, 0);
		$SEVEN = new Rank( "Seven", "7" , 6, 0);
		$EIGHT = new Rank( "Eight", "8" , 7, 0 );
		$NINE = new Rank( "Nine", "9" , 8, 2);
		$TEN = new Rank( "Ten", "t" , 9, 1);
		$JACK = new Rank( "Jack", "j" , 10, 3);
		$QUEEN = new Rank( "Queen", "q" , 11, 0);
		$KING = new Rank( "King", "k" , 12, 0);

		array_push($this->rankArr, $ACE);
		array_push($this->rankArr, $TWO);
		array_push($this->rankArr, $THREE);
		array_push($this->rankArr, $FOUR);
		array_push($this->rankArr, $FIVE);
		array_push($this->rankArr, $SIX);
		array_push($this->rankArr, $SEVEN);
		array_push($this->rankArr, $EIGHT);
		array_push($this->rankArr, $NINE);
		array_push($this->rankArr, $TEN);
		array_push($this->rankArr, $JACK);
		array_push($this->rankArr, $QUEEN);
		array_push($this->rankArr, $KING);
	}
	
	public function printValues()
	{
		foreach($this->cardArr as $obj)
		{
			print $obj->rank->face;
			print $obj->suit->suit;
			print "\n";
		}	
	}
	
	public function deckShuffle()
	{
		shuffle($this->cardArr);
		shuffle($this->cardArr);
	}
	
	
	public function generateCardDeck()
	{
		foreach ($this->suitArr as $suit)
		{
			foreach ($this->rankArr as $rank)
			{
				$card = new Card($suit, $rank);	
				array_push($this->cardArr, $card);
			}
		}

	}
	public function printCardIndices()
	{
		foreach($this->cardArr as $k)
		{
			print $k->index;
			print " ";
		}
		print "\n";
	}
}

class Trump {
	public $deckobj;
	public $playerArr = array();
	public $trump;
	public static $USERS;
	public static $CARDPERUSER;
	function __construct()
	{
		$this->USERS=4;
		$this->CARDPERUSER=13;
		$this->deckobj = new Deck();
		$this->deckobj->generateCardDeck();
		//$this->deckobj->printCardIndices();
		//$deckobj->deckShuffle();
		//$deckobj->printValues();
	}
	public function generatePlayerHand($player)
	{
		$start= ($this->CARDPERUSER * $player->player_id);
		$end = $start + $this->CARDPERUSER;
		//print "START:$start END:$end \n";
		if ($start<52)
		{
			for ($i=$start;$i<$end;$i++)
			{
				$player->addToPlayerHand($this->deckobj->cardArr[$i]);	
			}
		}
	}
	public function addUser($name, $id)
	{
		$player= new Player($name, $id);
		array_push($this->playerArr, $player);
		$cardStr="CARDS:";
		$cardArr = $this->generatePlayerHand($player);
		$player->printCardIndices();
		$cardStr= $cardStr . $player->arrayToStr();
		return $cardStr;
	}
	
}

?>
