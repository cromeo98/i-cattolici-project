@extends('layouts.app')

@section('dashboard')
    @include('admin.partials.dashboard')
@endsection

@section('content')
    <div class="container">
        <form>
            <div class="mb-3">
              <label for="name" class="form-label">Nome competizione</label>
              <input type="text" class="form-control" id="name" name="name" value="{{old('name', $competition->name)}}">
            </div>
            <div class="mb-3">
              <label for="year" class="form-label">Anno</label>
              <input type="number" class="form-control" id="year" name="year" min="2021" value="{{old('year', $competition->year)}}">
            </div>
            <div class="mb-3">
                <label for="link" class="form-label">Link</label>
                <input type="text" class="form-control" id="link" name="link" value="{{old('link', $competition->link)}}">
            </div>
            <button type="submit" class="btn btn-primary">Conferma le modifiche</button>
        </form>
    </div>
@endsection