@extends('adminlte::page')

@section('title', 'Detalhes do Plano')

@section('content_header')
    <h4>Detalhes do Plano <b>{{ $plan->name }}</b></h4>
@stop

@section('content')
    <div class="card">
        <div class="row">
            <div class="col-sm-3 col-6">
                <div class="description-block border-right">

                    <h5 class="description-header">{{ $plan->name }}</h5>
                    <span class="description-text">Plano</span>
                </div>
                <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-6">
                <div class="description-block border-right">
                    <h5 class="description-header">{{ moneyFormat($plan->price) }}</h5>
                    <span class="description-text">Valor</span>
                </div>
                <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-6">
                <div class="description-block border-right">
                    <h5 class="description-header">{{ $plan->description }}</h5>
                    <span class="description-text">Descrição</span>
                </div>
                <!-- /.description-block -->
            </div>
            <!-- /.col -->
            <div class="col-sm-3 col-6">
                <div class="description-block">
                    <h5 class="description-header">{{ $plan->slug }}</h5>
                    <span class="description-text">URL</span>
                </div>
                <!-- /.description-block -->
            </div>
        </div>
    </div>
    <form action="{{ route('plans.destroy', $plan->id) }}" method="post" class="d-inline"
        onsubmit="return confirm('Tem certeza que deseja excluir?')">
        @csrf @method('delete')
        <button type="submit" class="btn btn-danger">Excluir</button>
    </form>
    <a href="{{ route('plans.index') }}" class="btn btn-secondary">Voltar</a>
@stop
