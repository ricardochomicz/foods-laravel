@extends('adminlte::page')

@section('title', 'Planos')

@section('content_header')
    <h1>Planos</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-borderlles">
                <thead>
                    <tr>
                        <th>Plano</th>
                        <th>Preço</th>
                        <th>Descrição</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                        <tr>
                            <td>{{ $plan->name }}</td>
                            <td>{{ moneyFormat($plan->price) }}</td>
                            <td>{{ $plan->description }}</td>
                            <td>

                                {{-- <a href="{{ route('admin.plans.show', $plan->id) }}" class="btn btn-primary">Detalhes</a> --}}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
