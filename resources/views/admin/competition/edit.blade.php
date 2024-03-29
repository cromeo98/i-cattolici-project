@extends('layouts.app')

@section('dashboard')
    @include('admin.partials.dashboard')
@endsection

@section('content')
    <div class="container">
        <form action="{{route('admin.competition.update', $competition->id)}}" method="POST" enctype="multipart/form-data">

            @csrf

            @method('PUT')

            <div class="mb-3">
                <label for="name" class="form-label">Nome competizione</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name', $competition->name)}}" 
                @error('name') 
                    is-invalid 
                @enderror" required>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="year" class="form-label">Anno</label>
                <input type="number" class="form-control" id="year" name="year" min="2021" value="{{old('year', $competition->year)}}" 
                @error('year') 
                    is-invalid 
                @enderror" required>
                @error('year')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input type="text" class="form-control" id="link" name="link" value="{{old('link', $competition->link)}}" 
                @error('link') 
                is-invalid 
                @enderror">
                @error('link')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <a href="{{route('admin.competition.index')}}" class="btn btn-secondary">Torna indietro</a>
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection