@extends('layouts.app')

@section('dashboard')
    @include('admin.partials.dashboard')
@endsection

@section('content')
    <div>
        <a href="{{route('admin.image.create')}}" class="btn btn-primary mb-1">Aggiungi una foto</a>
    </div>

    @foreach ($data as $item)
        <div class="card" style="width: 18rem;">
            <img src="{{asset('storage/' . $item->src)}}" class="card-img-top" alt="{{$item->alt}}">
            <div class="card-body text-center">
                @if ($item->is_visible == 0)
                    <span>Non visibile </span><i class="fas fa-eye-slash"></i>
                @else
                <span>Visibile </span><i class="fas fa-eye"></i>
                @endif
            </div>
        </div>
    @endforeach

@endsection