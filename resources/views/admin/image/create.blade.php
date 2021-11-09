@extends('layouts.app')

@section('dashboard')
    @include('admin.partials.dashboard')
@endsection

@section('content')
    <div class="container">
        <form action="{{route('admin.image.store')}}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="row mb-3 align-items-center">

                {{-- title section --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo immagine *</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" 
                    @error('title') 
                        is-invalid 
                    @enderror" required>
                    @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                {{-- end title section --}}

                {{-- Start - visibility switch --}}
                <div class="col-12 col-lg-6">
                    <div class="form-check form-switch">
                        {{-- @dd(old('visibility')) --}}
                        <input name="is_visible" type="checkbox" class="form-check-input" id="flexSwitchCheck" 
                        @if(old('is_visible') == 'on')
                            checked
                        @endif>
                        <label class="form-check-label" for="flexSwitchCheck">Visibilità *</label>
                        <span class="text-muted">(se non selezionato, l'appartamento non sarà visibile. Potrai modificare questo campo in seguito)</span>
                    </div>
                </div>
                {{-- End - visibility switch --}}

            </div>


            {{-- img section --}}
            <div class="row mb-3">

                <div class="col-12">
                    <label for="src" class="form-label">Foto *</label>
                </div>

                <div class="col-12">
                    {{-- Inizio - Campo caricamento foto --}}
                    <div class="mb-3">
                        <input type="file" required accept="image/*" onchange="displayImg(event)" name="src" id="src" class="form-control-file mb-2
                        @error('src') 
                            is-invalid 
                        @enderror" required>
                    </div>

                </div>

                <div class="col-12">
                    {{-- Visualizza immagine caricata --}}
                    <img id="output" class="w-50" src="{{asset("img/empty-image-white.jpg")}}" alt="Couldn't load the image">  
                    @error('src')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            {{-- end img section --}}

            {{-- description section --}}
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="2" placeholder="Inserisci una breve descrizione">{{old('description')}}</textarea>
            </div>
            {{-- end description section --}}

            <div class="ms_must-compiled">I campi contrassegnati con * sono obbligatori</div>

            <a href="{{route('admin.image.index')}}" class="btn btn-secondary">Torna indietro</a>
            <button type="submit" class="btn btn-primary">Salva</button>
        </form>
    </div>
@endsection