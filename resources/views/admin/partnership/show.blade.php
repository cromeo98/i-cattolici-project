@extends('layouts.app')

@section('dashboard')
    @include('admin.partials.dashboard')
@endsection

@section('content')
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
              Dettagli Sponsor
            </div>
            <div class="card-body">
              <h5 class="card-title">{{$partnership->partner}}</h5>
              <p class="card-text">{{$partnership->description}}</p>
            </div>
            <div>
              @if($partnership->sponsorImg)
                <img src="{{ asset('storage/' . $partnership->sponsorImg) }}"
              @endif
            </div>
        </div>
        <a href="{{route('admin.partnership.index')}}" class="btn btn-secondary mt-3">Torna indietro</a>

        <a href="{{route('admin.partnership.edit', $partnership->id)}}" class="btn btn-primary mt-3">Modifica</a>

    </div>
@endsection