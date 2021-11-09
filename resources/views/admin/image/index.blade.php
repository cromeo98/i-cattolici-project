@extends('layouts.app')

@section('dashboard')
    @include('admin.partials.dashboard')
@endsection

@section('content')
    <div>
        <a href="{{route('admin.image.create')}}" class="btn btn-primary mb-1">Aggiungi una foto</a>
    </div>

    <div class="row justify-content-between">

        @if (empty($data->all()))
            <p class="pt-2 ps-3 h4">Nessuna foto caricata</p>
        @endif

        @foreach ($data as $item)

        <div class="col-6">

            <div class="card">
                <div class="ms_index-img-container">
                    <img class="ms_img" src="{{asset('storage/' . $item->src)}}" class="card-img-top img-thumbnail" alt="{{$item->alt}}">
                </div>
                <div class="card-body text-center">
                    @if ($item->is_visible == 0)
                        <span>Non visibile </span><i class="fas fa-eye-slash"></i>
                    @else
                    <span>Visibile </span><i class="fas fa-eye"></i>
                    @endif
                </div>
                <div class="card-footer text-center">
                    <a href="{{route('admin.image.show', $item->id)}}" class="btn btn-primary">Guarda</a>
                    <a href="#" class="btn btn-warning">Modifica</a>

                    {{-- delete --}}
                    <form action="{{route('admin.image.destroy', $item->id)}}" method="POST" class="d-inline-block text-center" id="form-destroy-{{$item->id}}">
                        {{-- Per ogni form bisogna inserire il token altrimenti il cambiamento non viene accettato dal sistema --}}
                        @csrf
                        @method('DELETE')

                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#imagesModal{{$item->id}}">Elimina</button>
                        
                    </form> 
                </div>
            </div>

        </div>
        <!-- Modal -->
        <div class="modal fade" id="imagesModal{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="imagesModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="imagesModalLabel">Elimina {{$item->title}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <span>Sei sicuro di voler eliminare l'immagine {{$item->title}}? Non potrai recuperarla.</span>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Annulla</button>
                        <button type="submit" form="form-destroy-{{$item->id}}" class="btn btn-danger">Elimina</button>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

@endsection