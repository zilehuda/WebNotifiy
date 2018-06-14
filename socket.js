var app   = require('express')();
var http  = require('http').Server(app);
var io    = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();
redis.subscribe('test-channel', function () {
    console.log('Redis: message-channel subscribed');
});
redis.on('message', function(channel, message) {
    console.log('Redis: Message on ' + channel + ' received!');
    console.log(message);
    message = JSON.parse(message);
    io.emit(channel + ':' + message.event, message.data);

});

io.on('connection', function(socket){
    console.log('a user connected ' + socket.id);
    socket.on('disconnect', function(){
        console.log('user disconnected');
    });
    socket.on('message',function(data){
      console.log(data);
      io.sockets.emit('message',data);
    });

});
http.listen(3000, function(){
    console.log('listening on *:3000');
});
