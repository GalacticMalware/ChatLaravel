
<div>
    {{ csrf_field() }}

    <div class="form-group">
        <label for="name">Nombre</label>
        <input disabled type="text" class="form-control" id="name" wire:model="name">
    </div>

    <div class="form-group">
        <label for="message">Mensaje</label>
        <input required type="text" class="form-control" id="message" wire:model="message">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <p>Por favor ingrese el mensaje:</p>
        </div>
        @endif
        <!--@error("message")<small class="text-danger">{{$message}}</small>@enderror-->
    </div>

    <button class="btn btn-primary" wire:click="sendMessage">Enviar mensaje</button>

    <div style="position:absolute;" class="alert alert-success collapse" role="alert" id="success"> Se ha enviado
    </div>

    <script>
        window.livewire.on("successAler", () => {
            $("#success").fadeIn("slow");
            setTimeout(() => $("#success").fadeOut("slow"), 3000);
        })
    </script>

</div>
