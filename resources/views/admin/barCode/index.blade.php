@extends('layout.admin.body')
@section('titulo',' Gerar Códigos de barra')

@section('conteudo')
@php

@endphp
<div class="container-fluid">

    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row">
          <!-- Small table -->
          <div class="col-md-12 my-4">
            <div class="card shadow">
              <div class="card-body">
                <form action="{{route('admin.barcode.store')}}" method="post">
                    @csrf
                    <div class="card-body">
                        @include('_form._barCodeForm.index')
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn mb-2 btn-primary" >Gerar Códigos</button>
                    </div>

                </form>
              </div>
            </div>
          </div> <!-- customized table -->
        </div> <!-- end section -->

      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
<div class="modal fade" id="verifyModal" tabindex="-1" role="dialog" aria-labelledby="verifyModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="verifyModalLabel">Verificar Candidato</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{route('admin.barcode.verify')}}" method="post">
            @csrf
            <div class="card-body">
                @include('_form._verifyBarCodeForm.index')
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn mb-2 btn-primary" >Gerar</button>
        </div>
        </div>
        </form>
    </div>
</div>
@endsection
