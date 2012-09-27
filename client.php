<html>
	<head>
		<title>Gameroom</title>
		<link rel="icon" type="image/ico" href="images/gamefavicon.ico"/>
		<link rel="STYLESHEET" type="text/css" href="style.css"/>
		<script src="util.js" type="text/javascript"></script>
		<?require_once("card.php");?>
	</head>
	<body class='gameroom' onload="init()">
		<h3>Gameroom v2.00</h3>
		<form name="refreshForm">
		<input type="hidden" name="visited" value="" />
		</form>
		<div class="chatroom">
			<div class="chatbox">
				<textarea class="chat" id="chat" disabled="disabled"></textarea>
				<input class="msg" id="msg" type="textbox" onkeypress="onkey(event)"/>
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
			<input class="msg" id="tmsg" type="textbox" onkeypress="onkey2(event)"/>
			</div>
		</div>
			<div class="card">
				<div id="botpos" class="bottomnum">
					<img id="bottomnum" class="pos" src="images/number-1.jpg" onclick="initcards('Anoop','bottom');"></img>
				</div>
				<div class="bottomref">
					<?generatecards("bottom");?>
				</div>
				<div id="leftpos" class="leftnum">
					<img id="leftnum" class="pos" src="images/number-4.jpg" onclick="initcards('Anoop','left');"></img>
				</div>
				<div class="leftref">
					<?generatecards("left");?>
				</div>
				<div id="rightpos" class="rightnum">
					<img id="rightnum" class="pos" src="images/number-2.jpg" onclick="initcards('Anoop','right');"></img>
				</div>
				<div class="rightref">
					<?generatecards("right");?>
				</div>
				<div id="toppos" class="topnum">
					<img id="topnum" class="pos" src="images/number-3.jpg" onclick="initcards('Anoop','top');"></img>
				</div>
				<div class="topref">
					<?generatecards("top");?>
				</div>
				<div class="centerref">
					<?initcentercards();?>
				</div>
			</div>
		</div>
	</body>
</html>
