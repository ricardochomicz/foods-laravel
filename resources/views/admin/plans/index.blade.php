@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <a href="{{ route('plans.create') }}" class="btn btn-primary">Novo Plano <i class="fas fa-plus"></i></a>
                <form action="{{ route('plans.index') }}" method="get" class="d-flex ml-3">
                    <input type="search" name="search" class="form-control" placeholder="Filtrar por nome"
                        value="{{ request()->input('search') }}">
                    <button class="btn btn-primary ml-2" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>

            <table class="table table-borderless table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Plano</th>
                        <th>Preço</th>
                        <th class="text-center">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{ $plan->id }}</td>
                            <td>{{ $plan->name }}</td>
                            <td>{{ moneyFormat($plan->price) }}</td>
                            <td class="text-center">
                                <a href="{{ route('plans.edit', $plan->id) }}" class="btn btn-sm btn-primary"><i
                                        class="fas fa-edit"></i></a>
                                <a href="{{ route('plans.show', $plan->id) }}" class="btn btn-sm btn-info">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="pagination pagination-sm">
                @if (isset($filters))
                    {!! $plans->appends($filters)->links('pagination::bootstrap-4') !!}
                @else
                    {!! $plans->links('pagination::bootstrap-4') !!}
                @endif
            </div>
        </div>
    </div>
@stop
