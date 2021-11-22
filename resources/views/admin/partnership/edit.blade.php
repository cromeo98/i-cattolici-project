@extends('layouts.app')

@section('dashboard')
    @include('admin.partials.dashboard')
@endsection

@section('content')
    <div class="container">
        <form action="{{route('admin.partnership.update', $partnership->id)}}" method="POST" enctype="multipart/form-data">

            @csrf

            @method('PUT')

            <div class="mb-3">
                <label for="partner" class="form-label">Nome Sponsor</label>
                <input type="text" class="form-control" id="partner" name="partner" value="{{old('partner', $partnership->partner)}}" 
                @error('partner') 
                    is-invalid 
                @enderror" required>
                @error('partner')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <input type="text" class="form-control" id="description" name="description" value="{{old('description', $partnership->description)}}" 
                @error('description') 
                    is-invalid 
                @enderror" required>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{route('admin.partnership.index')}}" class="btn btn-secondary">Torna indietro</a>
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection