@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="d-flex flex-column align-items-center">
                <h2 class="text-center mb-3">{{ $erro }}</h2>
                <button class="btn btn-primary mt-3" id="goBackButton" >Retornar</button>
            </div>
        </div>
    </div>
</div>

@endsection
