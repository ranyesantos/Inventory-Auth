@extends('layouts.app')

@section('title')
Adicionar Produto
@endsection

@section('content')

<div class="container">
    <div class="d-flex align-items-center my-4 ">
        <a class="btn me-2 p-0" onclick="window.history.go(-1)">
            <i class="bi bi-arrow-left-circle-fill fs-4"></i>
        </a>
        <h2 class="m-0">Adicionar Item</h2>
    </div>

    <form action="{{route('items-store')}}" id="productForm" method="POST">
    @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text"  class="form-control" name="name">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea rows="3" required type="text" class="form-control" name="description"></textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Valor</label>
            <input type="text" id="value" class="form-control" name="price">
        </div>

        <div class="mb-3">
            <label for="sell" class="form-label">Disponível para venda</label>
            <select name="sell" class="form-select">
                <option value="Sim">Sim</option>
                <option value="Não">Não</option>
            </select>
        </div>

        <div class="col d-flex justify-content-end">
            <button type="submit" class="btn btn-primary mt-3 float-right">
                Finalizar
            </button>
        </div>

    </form>
    @if ($errors->any())
        <span class="error-messages">
            @foreach ($errors->all() as $error)
                {{ $error }}<br>
            @endforeach
        </span>
    @endif
</div>
<script src="{{ asset('js/format.js') }}"></script>
@endsection
