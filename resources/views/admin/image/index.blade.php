@extends('layouts.app')

@section('dashboard')
    @include('admin.partials.dashboard')
@endsection

@section('content')
    <div>
        <a href="{{route('admin.image.create')}}" class="btn btn-primary mb-1">Aggiungi una foto</a>
    </div>

    <div class="card" style="width: 18rem;">
        <img src="..." class="card-img-top" alt="...">
        <div class="card-body">
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
    </div>
@endsection