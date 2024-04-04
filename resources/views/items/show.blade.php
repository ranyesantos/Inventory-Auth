@extends('layouts.app')
@section('title')
Detalhes
@endsection

@section('content')

<div class="container">
    <div class="d-flex align-items-center my-4 ">
        <button class="btn me-2 p-0" id="goBackButton">
            <i class="bi bi-arrow-left-circle-fill fs-4"></i>
        </button>
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
            <label for="value"  class="form-label">Valor</label>
            <input type="text" value="R$ {{ number_format($item->value, 2, ',', '.') }}" disabled readonly class="form-control" name="value">
        </div>

        <div class="mb-3">
            <label for="sell" class="form-label">Disponível para venda</label>
            <input type="text" value="{{$item->sell}}" disabled readonly class="form-control" name="sell">
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

