@extends("layout.general")

@section("conten")

<div class="conteniner">
    <h3></h3>
    
</h3>
    <div class="card" style="width: 100%; margin-top:2em;">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <div class="card-body">
                    @extends('complements.publication')
                    @livewire('chat-form')
                    @livewire('chat-list')
                </div>
            </div>
            <div class="col-md-2"></div>

        </div>
    </div>
</div>
@endsection("conten")