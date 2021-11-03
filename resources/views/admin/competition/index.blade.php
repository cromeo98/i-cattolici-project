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
                        <form action="{{route('admin.competition.destroy', $item->id)}}" method="POST" class="d-inline-block text-center">
                            {{-- Per ogni form bisogna inserire il token altrimenti il cambiamento non viene accettato dal sistema --}}
                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Elimina</button>
                            
                        </form>

                    </div>
                </div>
            </div> 
        @endforeach
        
    </div>

@endsection