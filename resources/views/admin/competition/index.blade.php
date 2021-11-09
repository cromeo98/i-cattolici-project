@extends('layouts.app')

@section('dashboard')
    @include('admin.partials.dashboard')
@endsection

@section('content')

    <div>
        <a href="{{route('admin.competition.create')}}" class="btn btn-primary mb-1">Aggiungi una competizione</a>
    </div>

    <div class="ms_my-table">
        <div class="ms_table-head-row">
            <div class="col-3">
                <div class="ms_table-title">Competizione</div>
            </div>
            <div class="col-2">
                <div class="ms_table-title">Anno</div>
            </div>
            <div class="col-3">
                <div class="ms_table-title">Link al sito</div>
            </div>
            <div class="col-4">
                <div class="ms_table-title">Azioni</div>
            </div>
        </div>

        @foreach ($data as $item)

            <div class="ms_table-row">
                <div class="col-3">
                    <div class="ms_table-cell">{{$item->name}}</div>
                </div>
                <div class="col-2">
                    <div class="ms_table-cell">{{$item->year}}</div>
                </div>
                <div class="col-3">
                    <div class="ms_table-cell">
                        @if ($item->link)
                            <a href="{{$item->link}}" target="_blank">{{$item->link}}</a>
                        @else
                            <span class="text-muted">Nessun link</span>
                        @endif
                    </div>
                </div>

                <div class="col-4">
                    <div class="ms_table-cell">

                        {{-- link to show --}}
                        <a href="{{route('admin.competition.show', $item->id)}}" class="btn btn-primary">Mostra</a>

                        <a href="{{route('admin.competition.edit', $item->id)}}" class="btn btn-warning">Modifica</a>

                        {{-- delete --}}
                        <form action="{{route('admin.competition.destroy', $item->id)}}" method="POST" class="d-inline-block text-center" id="form-destroy-{{$item->id}}">
                            {{-- Per ogni form bisogna inserire il token altrimenti il cambiamento non viene accettato dal sistema --}}
                            @csrf
                            @method('DELETE')

                            <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop{{$item->id}}">Elimina</button>
                            
                        </form> 

                    </div>
                </div>
            </div> 
            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop{{$item->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Elimina {{$item->name}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <span>Sei sicuro di voler eliminare la competizione {{$item->name}}? Non potrai recuperare i dati eliminati.</span>
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