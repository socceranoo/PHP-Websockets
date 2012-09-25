<?PHP
	function showcards($position)
	{
		$cardArr = Array("2", "3", "4", "5", "6", "7", "8", "9", "t", "j", "q", "k", "a1");
		$pos =-200;
		if ($position =="bottom" || $position =="top")
		{
			$axis="left:";
		}
		else	
			$axis="top:";
		$j=10;
		//for ($i=2;$i<=9;$i++)
		foreach($cardArr as $i)
		{
			$j++;
			$pos = $pos+27;
			$pos_str= $axis.$pos."px";
			$img_id= $position."img".$i;
			print $imd_id;
			print "<img id='$img_id' name='$img_id' src='images/cardback.gif' style='z-index:$j;position:absolute;$pos_str;' onclick=\"imgclick('$img_id')\"></img>";
		}
	}
?>
