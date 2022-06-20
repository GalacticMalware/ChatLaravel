<div>
    {{ csrf_field() }}

    <form wire:submit.prevent="sendMessage" enctype="multipart/form-data">
        <div class="form-group">
            <label for="name">Nombre</label>
            <input required type="text" disabled class="form-control" id="name" wire:model="name">
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

        <br />

        <div class="mb-3">
            <label for="formFile" class="form-label">Seleccionar un archivo</label>
            <input class="form-control" type="file" id="formFile" accept="image/png,image/jpeg,image/jpg ,audio/mp3,audio/ogg,audio/mpeg" wire:model="file">
        </div>

        <br />
        <div style="position:absolute;" class="alert alert-success collapse" role="alert" id="success"> Se ha enviado
        </div>
        <br />
        <button class="btn btn-primary" type="submit">Enviar mensaje</button>
    </form>

    <script>
        window.livewire.on("successAler", () => {
            $("#success").fadeIn("slow");
            setTimeout(() => $("#success").fadeOut("slow"), 3000);
        })
    </script>

</div>