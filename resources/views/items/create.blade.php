@extends('layouts.app')

@section('title')
Adicionar Produto
@endsection

@section('content')

<div class="container">
    <div class="d-flex align-items-center my-4 ">
        <a class="btn me-2 p-0" href="">
            <i class="bi bi-arrow-left-circle-fill fs-4"></i>
        </a>
        <h2 class="m-0">Adicionar Item</h2>
    </div>

    <form action="{{route('items-store')}}" method="POST">
    @csrf
    
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control" name="name">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea rows="3" type="text" class="form-control" name="description"></textarea>
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Categoria</label>
            <input type="text" class="form-control" name="category">
        </div>

        <div class="row d-flex align-items-center ">
            <div class="col d-flex justify-content-end">
                <button type="submit" class="btn btn-primary mt-3 float-right">
                    Finalizar
                </button>
            </div>
        </div>

    </form>

</div>

@endsection
