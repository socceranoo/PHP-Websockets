var socket, socket2, txtareaelem, teamchat;
var totalcards, totalplayers, curopencount;
var deck=52;
var cardArr = new Array("2", "3", "4", "5", "6", "7", "8", "9", "t", "j", "q", "k", "a1");
var suitArr = new Array("c", "h", "s", "d");

function init(user) {
	var host = "ws://10.180.157.222:9000/GIT/PHP-Websockets/testwebsock.php"; // SET THIS TO YOUR SERVER
	//var host = "ws://98.234.216.9:9000/github/PHP-Websockets/testwebsock.php"; // SET THIS TO YOUR SERVER
	try {
		socket = new WebSocket(host);
		txtareaelem = $("chat");
		//log('WebSocket - status '+socket.readyState);

		teamchat = $("tchat");

		log('Welcome to the gameroom');
		log('Connecting to the server ...');

		log2('Welcome to the gameroom');
		log2('Connecting to the server ...');

		socket.onopen    = function(msg) { 
								//log("Welcome - status "+this.readyState); 
								log("Connected"); 
								var user_msg = "USER:"+user;
								socket.send(user_msg); 
								log('You joined the conference room'); 
								log2("Connected"); 
								log2('You joined the conference room'); 
								totalcards=deck;	
								totalplayers=4;	
								cardperplayer=(totalcards/totalplayers);
								curopencount = totalcards;
								//showimages();
						   };
		socket.onmessage = function(msg) { 
							   log(msg.data); 
							   //log2(msg.data); 
						   };
		socket.onclose   = function(msg) { 
							   log("Disconnected"); 
							   log2("Disconnected"); 
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
		log2('You : '+msg); 
	} catch(ex) { 
		log2(ex); 
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

function log2(msg)
{
	teamchat.value += msg;
	teamchat.value += "\n";
	teamchat.scrollTop = teamchat.scrollHeight;
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

function cardclick(id)
{
	msg = "clicked "+id;
	log2(msg);
	hideimage(id);
	if (curopencount == 0)
	{
		showimage("bottomnum");	
		showimage("rightnum");	
		showimage("leftnum");	
		showimage("topnum");	
		curopencount=totalcards;
	}
	//socket.send(msg);
}

function showimages()
{
	myArray = new Array("top", "bottom", "left", "right");
	for(i=0; i<myArray.length; i++) 
	{
		showrow(myArray[i], suitArr[i]);
	}
	showimage("lcenter");
	showimage("bcenter");
	showimage("tcenter");
	showimage("rcenter");
}

function showrow(pos, suit)
{
	for(j=0;j<cardArr.length; j++)
	{
		k=j+1;
		id = pos+k;
		src= "images/"+cardArr[j]+suit+".gif";
		showimage(id);
		setimgsrc(id, src);
	}
	numid = pos+"num";
	hideimage(numid);
}

function imagenameforindex(index)
{
	suit=index/persuit;
	rank=index%persuit;
	return rank+suiti+".gif";

}

function hideimage(id)
{
	$(id).style.visibility='hidden';
	$(id).style.opacity=0;
}

function showimage(id)
{
	$(id).style.visibility='visible';
	$(id).style.opacity=1;
}

function setimgsrc(id, src)
{
	$(id).src=src;	
}
