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



function PP_server_socket(){
  var me = this;
  var client = [];
  var quest = [];
  var user = [];

  this.io = false;

  function init(){
    me.io = io.on('connection', function(socket){
      console.log('new connection.');
      client.push(new Client(me, socket));
    });
  }
  init();
}


function Client(serv, socket){
  
  function init(){
    socket.on('disconnect', function(){
      console.log('Socket id :' + socket.id + ' is disconnected.');
    });
  }
  init();
}