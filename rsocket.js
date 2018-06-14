var app   = require('express')();
var http  = require('http').Server(app);
var io    = require('socket.io')(http);
var Redis = require('ioredis');
var redis = new Redis();


io.on('connection', function(socket){
    console.log('a user connected ' + socket.id);

});
http.listen(3000, function(){
    console.log('listening on *:3000');
    redis.subscribe("message");
    redis.on('message', function(channel, message) {
        console.log('Redis: Message on ' + channel + ' received!');
        console.log(message);

    });
});
