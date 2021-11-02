@extends('layouts.app')

@section('dashboard')
    @include('admin.partials.dashboard')
@endsection

@section('content')

<div class="container">
    <div class="row bg-light">
        <div class="col-3">titolo</div>
        <div class="col-3">link</div>
        <div class="col-3">anno</div>
    </div>
    <div class="row">
        <div class="col-3">titolo 1</div>
        <div class="col-3">www.ciao</div>
        <div class="col-3">2016</div>
    </div>
</div>


@endsection