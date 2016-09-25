var fs = require('fs');
var app = require('express')();
var http = require('http').Server(app);
var io = require('socket.io')(http);

app.get('*', function(req, res){
  res.setHeader('Content-Type', 'text/html');
  res.writeHead(res.statusCode);
  res.write("zPadidaSz");
  res.end();
});

var chat_server = new PP_server_socket();

http.listen(3000, function(){
  console.log('listening on *:3000');
});



// var fs = require('fs');
// var https = require('https');
// var express = require('express');
// var app = express();
// var options = {
//   key: fs.readFileSync('./file.pem'),
//   cert: fs.readFileSync('./file.crt'),
//   ca: fs.readFileSync('./cs.crt')
// };
// var serverPort = 3000;
// var server = https.createServer(options, app);
// var io = require('socket.io')(server);
// io.on('connection', function(socket) {
//   console.log('new connection');
//   socket.emit('message', 'This is a message from the dark side.');
// });
// server.listen(serverPort, function() {
//   console.log('server up and running at %s port', serverPort);
// });


function PP_server_socket(){
  var me = this;
  var client = [];
  var quest = [];
  var user = [];

  var online = 0;

  this.io = false;

  function init(){
    me.io = io.on('connection', function(socket){
      console.log('new connection.');
      online++;
      socket.on('disconnect', function(){
        console.log('user disconnected');
        online--;
        me.io.emit("upuser",online);
      });
      socket.on("msg",function(data){
        console.log(data);
        data = escapeHtml(data);
        user.push(data);
        me.io.emit("msg","😁 : "+data);
      });
      if(user.length>10){
        var newss = [];
        newss.push(user[user.length-10]);
        newss.push(user[user.length-9]);
        newss.push(user[user.length-8]);
        newss.push(user[user.length-7]);
        newss.push(user[user.length-6]);
        newss.push(user[user.length-5]);
        newss.push(user[user.length-4]);
        newss.push(user[user.length-3]);
        newss.push(user[user.length-2]);
        newss.push(user[user.length-1]);
        user = newss;
      }
      me.io.emit("upuser",online);
      socket.emit("msg","😁 : กันเองทีวี สวัสดีค้าาาาาาาาา");
      for(var i=0;i<user.length;i++){
        socket.emit("msg","😁 : "+user[i]);
      }
    });
  }
  init();
}

function escapeHtml(text) {
  return text
      .replace(/&/g, "&amp;")
      .replace(/</g, "&lt;")
      .replace(/>/g, "&gt;")
      .replace(/"/g, "&quot;")
      .replace(/'/g, "&#039;");
}