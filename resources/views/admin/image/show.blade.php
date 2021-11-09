@extends('layouts.app')

@section('dashboard')
    @include('admin.partials.dashboard')
@endsection

@section('content')
    <div class="container">

        <div class="row mb-3 align-items-center">

            {{-- title section --}}
            <div>
                <p for="title" class="form-control">Titolo immagine: {{$image->title}}</p>
            </div>
            {{-- end title section --}}

            {{-- Start - visibility switch --}}
            <div class="col-12">
                @if ($image->is_visible == 0)
                <span class="form-control">Non visibile <i class="fas fa-eye-slash"></i></span>
                @else
                <span class="form-control">Visibile <i class="fas fa-eye"></i></span>
                @endif
            </div>
            {{-- End - visibility switch --}}

        </div>


        {{-- img section --}}
        <div class="row mb-3">

            <div class="col-12">
                <div class="form-label">Foto:</div>
                <img class="ms_show-image img-thumbnail" src="{{asset('storage/' . $image->src)}}" alt="{{$image->alt}}">
            </div>

        </div>
        {{-- end img section --}}

        {{-- description section --}}
        <div class="mb-3">
            <label for="description" class="form-label">Descrizione: </label>
            <p class="form-control">
                @if (isset($image->description))
                    {{$image->description}}
                @else
                    Nessuna descrizione inserita.
                @endif
            </p>
        </div>
        {{-- end description section --}}

        <div class="ms_must-compiled">I campi contrassegnati con * sono obbligatori</div>

        <a href="{{route('admin.image.index')}}" class="btn btn-secondary">Torna indietro</a>

    </div>
@endsection