@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="d-flex flex-column align-items-center">
                @foreach($errors->all() as $error)
                    <ul>
                        <li>{{ htmlspecialchars($error) }}</li>
                    </ul>
                @endforeach
                <button class="btn btn-primary mt-3" id="goBackButton" >Retornar</button>
            </div>
        </div>
    </div>
</div>

@endsection
