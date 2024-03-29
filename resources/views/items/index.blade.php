@extends('layouts.app')

@section('title')
Página Inicial
@endsection


@auth
@section('content')
    <div class="container">
        <div class="row my-4 align-items-center">
            <div class="col d-flex align-items-center">
                <i class="bi bi-person-circle fs-3"></i>
                <h class="fs-4 px-2">{{Auth::user()->name}}</h2>
            </div>
            <div class="col">
                <h2>Todos os Items</h2>
            </div>
            <div class="col">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{route('items-create')}}">
                        Adicionar
                    </a>
                </div>
            </div>
        </div>

        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="col-5">Item</th>
                <th scope="col" class="px-1">Categoria</th>
                <th scope="col"></th>
            </tr>
        </thead>
            <tbody>

                @foreach ($items as $item)
                <tr>
                    <td><div class="mt-1">{{$item->name}}</div></td>
                    <td><div class="mt-1">{{$item->category}}</div></td>

                    <td class="mb-1 col-1">
                        <div class="row">

                            <div class="col">
                                <a href="{{route('items-show', ['id' => $item->id])}}" class="btn p-0 m-0" title="Detalhes">
                                    <i class="bi bi-info-circle-fill text-warning fs-4"></i>
                                </a>
                            </div>
                            @if (Auth::user()->admin)
                            <div class="col">
                                <form action="{{route('items-destroy', ['id' => $item->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <button class="btn p-0 m-0" title="Excluir">
                                        <i class="bi bi-x-circle-fill text-danger fs-4"></i>
                                    </button>
                                </form>
                            </div>
                            @endif
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@endauth

@guest
@section('content')
    <div class="container">
        <div class="my-4 d-flex justify-content-between">
            <div class="col d-flex align-items-center">
                <i class="bi bi-person-circle fs-3"></i>
                <h2 class="fs-5 mb-0 px-2">
                    <a id="login-a" href="#">Visitante</a>
                </h2>
            </div>

            <div class="col">
                <h2>Todos os Items</h2>
            </div>
            <div class="col">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary" href="{{route('items-create')}}">
                        Adicionar
                    </a>
                </div>
            </div>
        </div>

        <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col" class="col-5">Item</th>
                <th scope="col" class="px-1">Categoria</th>
                <th scope="col"></th>
            </tr>
        </thead>
            <tbody>

                @foreach ($items as $item)
                <tr>
                    <td><div class="mt-1">{{$item->name}}</div></td>
                    <td><div class="mt-1">{{$item->category}}</div></td>

                    <td class="mb-1 col-1">
                        <div class="row">

                            <div class="col">
                                <a href="{{route('items-show', ['id' => $item->id])}}" class="btn p-0 m-0" title="Detalhes">
                                    <i class="bi bi-info-circle-fill text-warning fs-4"></i>
                                </a>
                            </div>

                            <div class="col">
                                <form action="{{route('items-destroy', ['id' => $item->id])}}" method="POST">
                                @csrf
                                @method('DELETE')
                                    <button class="btn p-0 m-0" title="Excluir">
                                        <i class="bi bi-x-circle-fill text-danger fs-4"></i>
                                    </button>
                                </form>
                            </div>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@endguest


