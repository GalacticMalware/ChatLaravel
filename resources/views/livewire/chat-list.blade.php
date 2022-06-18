<div>
  <div class="mt-3"><strong>Lista de mensajes</strong></div>

  @foreach($messages as $message)
  <li>{{$message["user"]}} - {{$message["message"]}}</li>
  @endforeach


  <script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('83af551bbfbfdf479c5b', {
      cluster: 'us2'
    });

    var channel = pusher.subscribe('chat-channel');
    channel.bind('chat-event', function(data) {
      window.livewire.emit('sendMessage',data)
      //alert(JSON.stringify(data));
    });
  </script>
</div>