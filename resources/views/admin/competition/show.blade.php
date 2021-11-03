@extends('layouts.app')

@section('dashboard')
    @include('admin.partials.dashboard')
@endsection

@section('content')
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
              Competizione anno {{$competition->year}}
            </div>
            <div class="card-body">
              <h5 class="card-title">{{$competition->name}}</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="{{$competition->link}}" class="btn btn-primary">Vai al sito</a>
            </div>
        </div>
        <a href="{{route('admin.competition.index')}}" class="btn btn-secondary mt-3">Torna indietro</a>

        <a href="{{route('admin.competition.edit', $competition->id)}}" class="btn btn-primary mt-3">Modifica</a>

    </div>
@endsection