<?PHP
	function generatecards($position)
	{
		$pos =-200;
		$card_spacing=20;
		if ($position =="bottom" || $position =="top")
		{
			$axis="left:";
		}
		else	
			$axis="top:";
		$j=10;
		$count = 0;
		for($k=0; $k<13;$k++)
		{
			$j++;
			$count++;
			$pos = $pos+$card_spacing;
			$pos_str= $axis.$pos."px";
			$img_id= $position.$count;
			print "<img id='$img_id' src='images/cardback.gif' style='z-index:$j;position:absolute;$pos_str;' onclick=\"cardclick('$img_id')\"></img>";
			//print "<img id='$img_id' src='images/cardback.gif' style='z-index:$j;position:absolute;$pos_str;'></img>";
		}
	}
	function initcentercards()
	{
		$spacing ="50px";
		print "<img id='rcenter' src='images/2c.gif' style='z-index:15;position:absolute;top:0px;left:$spacing;'></img>";
		//print "<img id='rcenter' src='images/cardback.gif' style='z-index:15;position:absolute;top:0px;left:$spacing;'></img>";
		print "<img id='lcenter' src='images/cardback.gif' style='z-index:13;position:absolute;top:0px;left:-$spacing;'></img>";
		print "<img id='bcenter' src='images/cardback.gif' style='z-index:16;position:absolute;top:$spacing;left:0px'></img>";
		print "<img id='tcenter' src='images/cardback.gif' style='z-index:14;position:absolute;top:-$spacing;left:0px'></img>";
	}
?>
