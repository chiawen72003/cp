var http = require("http");
var url = require('url');
var fs = require('fs');
var io = require('socket.io'); // 加入 Socket.IO
var room = [];//房間資訊
var user = [];//連線使用者資訊
var domain = require('domain');//使用domain來捕捉異步error用

var server = http.createServer(function(request, response) {	
	var reqd = domain.create();
	reqd.add(request);
	reqd.add(response);
	reqd.on('error', function(er) {
	  console.error('Error', er, request.url);
	 /*  try {
		res.writeHead(500);
		res.end('Error occurred, sorry.');
	  } catch (er) {
		console.error('Error sending 500', er, req.url);
	  } */
	});
});

server.listen(8081);
var serv_io = io.listen(server);// 開啟 Socket.IO 的 listener
serv_io.sockets.on('connection', function(socket) {
	socket.on('userLogin',function(username) {
		//設定房間，把使用者的socket資訊塞進去
		if (!(username['room_id'] in room)) {// not set.
			room[username.room_id] = [];
			room[username.room_id].push(socket);
		}else{
			room[username.room_id].push(socket);
		}
		user[socket.id] = username.room_id;//註冊一個使用者ID及對應房間
		
		for(var x=0;x<room[username.room_id].length;x++){
			var userData = room[username.room_id][x];
			if(socket.id != userData.id){
				userData.emit('friendLogin', '夥伴登入!!');
			}
			
			//如果一進來對手就已經存在。通知自己該房間已經有同伴在裡面
			if(socket.id == userData.id && room[username.room_id].length == 2){
				userData.emit('friendIsInRoom', '夥伴已經在房間了!!');
			}
		} 
		
		
	 });
	 
	//收到聊天訊息
	socket.on('message',function(msg) {
		//設定房間，把使用者的socket資訊塞進去
		var roomNum = user[socket.id];	       
		for(var x=0;x<room[roomNum].length;x++){
			var userData = room[roomNum][x];
			if(socket.id != userData.id){
				userData.emit('message', msg);
			}
		} 
	 });	 

	socket.on('getNextModel',function(msg) {
		//換下一個模組，同房間的人都要更換模組
		var roomNum = user[socket.id];	
      	for(var x=0;x<room[roomNum].length;x++){
			var userData = room[roomNum][x];
			userData.emit('getNextModel', msg);
		} 
	 });	 
	 
	socket.on('modelsComman',function(msg) {
		console.log(msg);
		//設定房間，把使用者的socket資訊塞進去
		var roomNum = user[socket.id];	
       
		for(var x=0;x<room[roomNum].length;x++){
			var userData = room[roomNum][x];
			if(socket.id != userData.id){
				userData.emit('modelsComman', msg);
			}
		} 
	 });	 	 
	 
    socket.on('disconnect', function() {
		try {
			//連線中斷後，移除中斷的使用者資訊 按下F5 reloadpg的狀態
			var roomNum = user[socket.id];	
			var index = room[roomNum].indexOf(socket);
			if (index != -1) {
				room[roomNum].splice(index, 1);//清除不在線的資料
			}
			
			for(var x=0;x<room[roomNum].length;x++){
				var userData = room[roomNum][x];
				userData.emit('friendLogout', '夥伴登出!!');
			} 
		}catch (e) { // 把例外物件傳給錯誤處理器
			console.log(e);
		}
    });
	
});

console.log('系統啟動');
