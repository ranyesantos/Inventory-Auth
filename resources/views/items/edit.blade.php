@extends('layouts.app')
@section('title')
Detalhes
@endsection

@section('content')
<div class="container">
    <div class="d-flex align-items-center my-4 ">
        <a class="btn me-2 p-0" href="">
            <i class="bi bi-arrow-left-circle-fill fs-4"></i>
        </a>
        <h2 class="m-0">Detalhes</h2>
    </div>

    <form action="{{route('items-update', ['id' => $item->id])}}" method="POST">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" value="{{$item->name}}" class="form-control" name="name">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea rows="3" type="text" class="form-control" name="description">{{$item->description}}</textarea>
        </div>

        <div class="mb-3">
            <label for="category"  class="form-label">Categoria</label>
            <input type="text" value="{{$item->category}}" class="form-control" name="category">
        </div>

        <div class="row d-flex align-items-center">
            <div class="col d-flex justify-content-end">
                <a  class="btn btn-primary mt-3 me-2 float-right">
                    Cancelar
                </a>

                <button type="submit" class="btn mt-3 float-right bg-warning text-white">
                    Finalizar
                </button>
            </div>
        </div>

    </form>

</div>
@endsection

