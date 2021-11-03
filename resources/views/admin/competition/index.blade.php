@extends('layouts.app')

@section('dashboard')
    @include('admin.partials.dashboard')
@endsection

@section('content')

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
                        <a href="https://www.ourwaysports.com/event-details/unigames-1" target="_blank">{{$item->link}}</a>
                    </div>
                </div>

                <div class="col-4">
                    <div class="ms_table-cell">

                        {{-- link to show --}}
                        <a href="{{route('admin.competition.show', $item->id)}}" class="btn btn-primary">Mostra</a>

                        <a href="{{route('admin.competition.edit', $item->id)}}" class="btn btn-warning">Modifica</a>
                        
                        <button type="button" class="btn btn-danger">Elimina</button>
                    </div>
                </div>
            </div> 
        @endforeach
        
    </div>

    {{-- <table class="table ms_my-table">
        <thead class="w-100 table-light">
            <tr>
                <th scope="col">#</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody class="bg-white">
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td colspan="2">Larry the Bird</td>
                <td>@twitter</td>
            </tr>
        </tbody>
    </table> --}}

@endsection