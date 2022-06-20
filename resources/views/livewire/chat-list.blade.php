<div>
  <div class="mt-3"><strong>Lista de mensajes</strong></div>
  @foreach($messages as $message)
  @if($message["name"] == $name)
  <div class="alert alert-warning" style="margin-right: 50px;">
    <strong>{{$message["name"]}}</strong><small class="float-right">{{$message["created_at"]}}</small>
    <br><span class="text-muted">{{$message["message"]}}</span>
  </div>
  @else
  <div class="alert alert-success" style="margin-left: 50px;">
    <strong>{{$message["name"]}}</strong><small class="float-right">{{$message["created_at"]}}</small>
    <br><span class="text-muted">{{$message["message"]}}</span>
  </div>
  @endif
  <!--<li>{{$message["name"]}} - {{$message["message"]}}</li> -->
  @endforeach


  <script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('83af551bbfbfdf479c5b', {
      cluster: 'us2'
    });

    var channel = pusher.subscribe('chat-channel');
    channel.bind('chat-event', function(data) {
      window.livewire.emit('sendMessage', data)
      //alert(JSON.stringify(data));
    });
  </script>
</div>