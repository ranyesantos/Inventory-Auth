@extends('layouts.app')
@section('title')
Editar
@endsection

@if (Auth::user()->admin)
@section('content')
<div class="container">
    <div class="d-flex align-items-center my-4 ">
        <button class="btn me-2 p-0" id="goBackButton">
            <i class="bi bi-arrow-left-circle-fill fs-4"></i>
        </button>
        <h2 class="m-0">Editar</h2>
    </div>

    <form action="{{route('items-update', ['id' => $item->id])}}" id="productForm" method="POST">
    @csrf
    @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Nome</label>
            <input type="text"  value="{{$item->name}}" class="form-control" name="name">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrição</label>
            <textarea rows="3"  type="text" class="form-control" name="description">{{$item->description}}</textarea>
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Valor</label>
            <input type="text"  id="value" value="{{$item->price}}" class="form-control" name="price">
        </div>

        <div class="mb-3">
            <label for="sell" class="form-label">Disponível para venda</label>
            <select name="sell" class="form-select">
                @if ($item->sell == "Sim")
                    <option value="Sim" selected>Sim</option>
                    <option value="Não">Não</option>
                @else
                    <option value="Sim">Sim</option>
                    <option value="Não" selected>Não</option>
                @endif
            </select>
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
<script src="{{ asset('js/format.js') }}"></script>
@endsection
@else

@endif
