<html>
	<head>
		<title>WebSocket</title>
		<link rel="STYLESHEET" type="text/css" href="style.css"/>
		<script> var socket, socket2, txtareaelem, teamchat;</script>
		<script src="util.js" type="text/javascript"></script>
		<?require_once("card.php");?>
	</head>
	<body class='gameroom' onload="init('Anoop')">
		<h3>WebSocket v2.00</h3>
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
				<div id="temp" class="botcard" onclick="showimages()";>
					<?showcards("bottom");?>
				</div>
				<div class="leftcard">
					<?showcards("left");?>
				</div>
				<div class="rightcard">
					<?showcards("right");?>
				</div>
				<div class="topcard">
					<?showcards("top");?>
				</div>
			</div>
		</div>
	</body>
</html>
