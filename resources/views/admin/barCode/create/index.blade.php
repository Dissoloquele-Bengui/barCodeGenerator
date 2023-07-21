@extends('layout.admin.body')
@section('titulo','Gerar Código de Barras')

@section('conteudo')
    <div class="card shadow mb-4">
        <div class="card-header">
        <strong class="card-title">Gerar Código de Barras</strong>
        </div>
        <form action="{{route('admin.barcode.store')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form._barCodeForm.index')
                <button type="submit" class="btn btn-primary w-md">Gerar</button>
            </div>
        </form>
    </div>
@endsection
