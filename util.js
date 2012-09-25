function init(user) {
	var host = "ws://10.180.157.222:9000/GIT/PHP-Websockets/testwebsock.php"; // SET THIS TO YOUR SERVER
	//var host = "ws://98.234.216.9:9000/github/PHP-Websockets/testwebsock.php"; // SET THIS TO YOUR SERVER
	try {
		socket = new WebSocket(host);
		txtareaelem = $("chat");
		//log('WebSocket - status '+socket.readyState);
		log('Welcome to the gameroom');
		log('Connecting to the server ...');
		socket.onopen    = function(msg) { 
								//log("Welcome - status "+this.readyState); 
								log("Connected"); 
								var user_msg = "USER:"+user;
								socket.send(user_msg); 
								log('You joined the conference room'); 
						   };
		socket.onmessage = function(msg) { 
							   log(msg.data); 
						   };
		socket.onclose   = function(msg) { 
							   log("Disconnected"); 
							   //log("Disconnected - status "+this.readyState); 
						   };
	}
	catch(ex){ 
		log(ex); 
	}
	$("msg").focus();
}

function send(){
	var txt,msg;
	txt = $("msg");
	msg = txt.value;
	if(!msg) { 
		//alert("Message can not be empty"); 
		return; 
	}
	txt.value="";
	txt.focus();
	try { 
		socket.send(msg); 
		log('You : '+msg); 
	} catch(ex) { 
		log(ex); 
	}
}

function send2(){
	var txt,msg;
	txt = $("tmsg");
	msg = txt.value;
	if(!msg) { 
		//alert("Message can not be empty"); 
		return; 
	}
	txt.value="";
	txt.focus();
	try { 
		socket.send(msg); 
		log('You : '+msg); 
	} catch(ex) { 
		log(ex); 
	}
}

function quit(){
	if (socket != null) {
		log("Goodbye!");
		socket.close();
		//socket.disconnect();
		socket=null;
	}
}

function reconnect() {
	quit();
	init('Anoop');
}

// Utilities
function $(id){ return document.getElementById(id); }
function log(msg)
{
	txtareaelem.value += msg;
	txtareaelem.value += "\n";
	txtareaelem.scrollTop = txtareaelem.scrollHeight;
// JQUERY EQUIVALENT FOR Text area append;
// $("log").innerHTML+="<br>"+msg; 
}
function onkey(event)
{
	if(event.keyCode==13)
	{ 
		send(); 
	}
}
function onkey2(event)
{
	if(event.keyCode==13)
	{ 
		send2(); 
	}
}
