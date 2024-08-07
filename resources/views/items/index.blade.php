@extends('layouts.app')

@section('title')
Página Inicial
@endsection


@auth
@section('content')
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light my-4 d-flex justify-content-between align-items-center">
            <div class="col d-flex justify-content-between align-items-center">
                <div class="align-items-center">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle d-flex align-items-center p-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle fs-3 px-2"></i>
                            <span class="d-none d-md-flex">{{Auth::user()->name}}</span>
                        </button>
                        <ul class="dropdown-menu">
                            <div class="d-flex align-items-center px-3">
                                </li>
                                   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item px-1" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                            </div>
                        </ul>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <h2 class="text-center">
                        Todos os Items
                    </h2>
                </div>
                <div>
                    <div class="d-flex justify-content-end">
                        <a class="btn btn-primary d-flex align-items-center" href="{{route('items-create')}}">
                            <i class="bi bi-plus-circle fs-5"></i>
                            <span class="d-none d-sm-inline m-1 ">Adicionar</span>
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" class="col-1">Nome</th>
                    <th scope="col" class="px-0 col-1 text-center">Valor</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>

            @foreach ($items as $item)
                <tr>
                    <td><div class="mt-1">{{$item->name}}</div></td>
                    <td><div class="mt-1 text-center">R$ {{ number_format($item->price, 2, ',', '.') }}</div></td>

                    <td class="mb-1 p-0 col-1 px-2">
                        <div class="row">
                            @if (Auth::user()->admin)
                                <div class="col p-0 m-0 d-flex justify-content-end align-items-center">
                                    <a href="{{route('items-show', ['id' => $item->id])}}" class="btn p-1 m-0 d-flex " title="Detalhes">
                                        <i class="bi bi-info-circle-fill text-warning fs-4"></i>
                                    </a>
                                    <form action="{{route('items-destroy', ['id' => $item->id])}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                        <button class="btn px-1 m-0 d-flex" title="Excluir">
                                            <i class="bi bi-x-circle-fill text-danger fs-4"></i>
                                        </button>
                                    </form>
                                </div>
                            @else
                                <div class="col d-flex justify-content-end">
                                    <a href="{{route('items-show', ['id' => $item->id])}}" class="btn p-0 m-0" title="Detalhes">
                                        <i class="bi bi-info-circle-fill text-warning fs-4"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
@endauth

@guest
@section('content')
    <div class="container">
        <div class="col my-4 d-flex justify-content-between align-items-center">
            <div class="col d-flex align-items-center">
                <span class="d-none d-md-flex"><i class="bi bi-person-circle fs-3"></i></span>
                <div class="flex-column align-items-center">
                    <h2 class="fs-5 mb-0 px-2">
                        Visitante
                    </h2>
                    <a href="{{route('login')}}" class="text-center mb-0 px-md-2 ">
                        Efetuar Login
                    </a>
                </div>
            </div>

            <div class="d-flex justify-content-center">
                <h2>Todos os Items</h2>
            </div>
            <div class="col">
                <div class="d-flex justify-content-end">
                    <a class="btn btn-primary d-flex align-items-center" href="{{route('items-create')}}">
                        <i class="bi bi-plus-circle fs-5"></i>
                        <span class="d-none d-sm-inline m-1">Adicionar</span>
                    </a>
                </div>
            </div>
        </div>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col" class="col-1">Item</th>
                    <th scope="col" class=" col-1 text-center">Categoria</th>
                    <th scope="col" class=""></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($items as $item)
                <tr>
                    <td><div class="mt-1">{{$item->name}}</div></td>
                    <td><div class="mt-1 text-center">{{$item->category}}</div></td>

                    <td class="mb-1 col-1">
                        <div class="d-flex justify-content-end">
                            <a href="{{route('items-show', ['id' => $item->id])}}" class="btn p-0 m-0" title="Detalhes">
                                <i class="bi bi-info-circle-fill text-warning fs-4"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@endguest


