@extends('master')

@section('content')
    <p id="power">0</p>

    <input id="msg" type="text" name="msg" value="">
    <button onclick="myfunc()" type="button" name="button">send</button>
    <p id="demo" onclick="myFunction()">Click me to change my text color.</p>
@stop

@section('footer')
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/1.4.8/socket.io.min.js"></script>
    <script>
        //var socket = io('http://localhost:3000');
        var socket = io('http://localhost:3000');
        socket.on("test-channel:App\\Events\\NotificationEvent", function(message){
            // increase the power everytime we load test route
            $('#power').text(parseInt($('#power').text()) + parseInt(message.data.power) );
            socket.emit('message',{message:data});
        });

        socket.on("message", function(message){
          console.log(message);
        });



        function myfunc()
        {
          var msg = document.getElementById("msg").value;
          socket.emit('message',{
            message:msg
          });
        }

    </script>
@stop
