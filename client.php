<?PHP
	$name=uniqid();
	//$name="Anoop";
?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
	<head>
		<meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>	
		<title>Gameroom</title>
		<link rel="icon" type="image/ico" href="images/gamefavicon.ico"/>
		<link rel="STYLESHEET" type="text/css" href="style.css"/>
		<script type='text/javascript' src='http://ajax.googleapis.com/ajax/libs/jquery/1.6.4/jquery.min.js'></script>
		<script src="util.js" type="text/javascript"></script>
		<?require_once("card.php");?>
	</head>
	<body class='gameroom' onload="init()">
		<h3>Gameroom v2.00</h3>
		<form name="refreshForm">
		<input type="hidden" name="visited" value="" />
		<input type="hidden" id='uname' name="uname" value=<?echo $name;?>>
		</form>
		<div class="chatroom">
			<div class="chatbox">
				<textarea class="chat" id="chat" disabled="disabled"></textarea>
				<input class="msg" id="msg" onkeypress="onkey(event)"/>
				<!--
				<button class="b1" onclick="send()">Send</button>
				<button class="b1" onclick="quit()">Quit</button>
				<button class="b1" onclick="reconnect()">Reconnect</button>
				-->
			</div>
		</div>
		<div class="teamchat">
			<div class="chatbox">
			<textarea class="chat" id="tchat" disabled="disabled"></textarea>
			<input class="msg" id="tmsg" onkeypress="onkey2(event)"/>
			</div>
		</div>
			<div class="card">
				<div id="botpos" class="bottomnum">
					<img id="bottomnum" class="pos" alt="NUMBER 1" src="images/number-1.jpg" onclick="initcards('bottom');">
				</div>
				<div class="bottomref">
					<?generatecards("bottom");?>
				</div>
				<div id="leftpos" class="leftnum">
					<img id="leftnum" class="pos" alt="NUMBER 4" src="images/number-4.jpg" onclick="initcards('left');">
				</div>
				<div class="leftref">
					<?generatecards("left");?>
				</div>
				<div id="rightpos" class="rightnum">
					<img id="rightnum" class="pos" alt="NUMBER 2" src="images/number-2.jpg" onclick="initcards('right');">
				</div>
				<div class="rightref">
					<?generatecards("right");?>
				</div>
				<div id="toppos" class="topnum">
					<img id="topnum" class="pos" alt="NUMBER 3" src="images/number-3.jpg" onclick="initcards('top');">
				</div>
				<div class="topref">
					<?generatecards("top");?>
				</div>
				<div class="centerref">
					<?initcentercards();?>
				</div>
			</div>
	</body>
</html>
