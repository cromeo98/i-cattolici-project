@extends('layouts.app')

@section('dashboard')
    @include('admin.partials.dashboard')
@endsection

@section('content')
    <div class="container">
        <form action="{{route('admin.partnership.store')}}" method="POST" enctype="multipart/form-data">

            @csrf

            <div class="mb-3">
                <label for="partner" class="form-label">Nome Sponsor *</label>
                <input type="text" class="form-control" id="partner" name="partner" value="{{old('partner')}}" 
                @error('partner') 
                    is-invalid 
                @enderror" required>
                @error('partner')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione*</label>
                <input type="text" class="form-control" id="description" name="description" value="{{old('description')}}" 
                @error('description') 
                    is-invalid 
                @enderror" required>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-1">
                
                <label for="img">Immagine</label>
                <input id="img" type="file" name="img" @error('img') is-invalid @enderror”>
                @error('img')
                <div >{{ $message }}</div>
                @enderror

            </div>

            <div class="ms_must-compiled">I campi contrassegnati con * sono obbligatori</div>

            <a href="{{route('admin.competition.index')}}" class="btn btn-secondary">Torna indietro</a>
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection