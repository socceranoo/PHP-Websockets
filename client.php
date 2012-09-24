<html>
	<head>
		<title>WebSocket</title>
		<link rel="STYLESHEET" type="text/css" href="style.css"/>
		<script> var socket; </script>
		<script src="util.js" type="text/javascript"></script>
	</head>
	<body onload="init('Anoop')">
		<h3>WebSocket v2.00</h3>
		<div id="log"></div>
		<input id="msg" type="textbox" onkeypress="onkey(event)"/>
		<button onclick="send()">Send</button>
		<button onclick="quit()">Quit</button>
		<button onclick="reconnect()">Reconnect</button>
	</body>
</html>
