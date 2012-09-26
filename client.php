<html>
	<head>
		<title>Gameroom</title>
		<link rel="STYLESHEET" type="text/css" href="style.css"/>
		<script src="util.js" type="text/javascript"></script>
		<?require_once("card.php");?>
	</head>
	<body class='gameroom' onload="init('Anoop')">
		<h3>Gameroom v2.00</h3>
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
				<div id="bottomnum" class="bottomnum" onclick="showimages();"></div>
				<div class="bottomref">
					<?generatecards("bottom");?>
				</div>
				<div id="leftnum" class="leftnum"></div>
				<div class="leftref">
					<?generatecards("left");?>
				</div>
				<div id="rightnum" class="rightnum"></div>
				<div class="rightref">
					<?generatecards("right");?>
				</div>
				<div id="topnum" class="topnum"></div>
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
