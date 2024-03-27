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
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text" value="{{$item->name}}" disabled readonly class="form-control" name="name">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea rows="3" type="text" disabled readonly class="form-control" name="description">{{$item->description}}</textarea>
        </div>

        <div class="mb-3">
            <label for="category"  class="form-label">Categoria</label>
            <input type="text" value="{{$item->category}}" disabled readonly class="form-control" name="category">
        </div>

        <div class="row d-flex align-items-center">
            <div class="col d-flex justify-content-end">
                <form action="{{route('items-destroy', ['id' => $item->id])}}" method="POST">
                @csrf
                @method('DELETE')
                    <button type="submit" class="btn btn-primary mt-3 me-2 float-right">
                        Excluir
                    </button>
                </form>

                <a href="{{route('items-edit', ['id' => $item->id])}}" class="btn mt-3 float-right bg-warning text-white">
                    Editar
                </a>
            </div>
        </div>
    </div>

</div>
@endsection

