<div class="row">
    <div class="col-md-6">
        <div class="form-group mb-3">
            <label for="qtd">Quantidade de Códigos</label>
            <input required type="number" id="qtd" name="qtd" class="form-control" value="{{isset($barCode) ?$barCode->qtd: old('qtd') }}">
        </div>
    </div> <!-- /.col -->
    <div class="col-md-6">

        <div class="form-group mb-3">
            <label for="dimensao">Tamanho</label>
            <input required type="number" id="dimensao" name="dimensao" class="form-control" value="{{isset($barCode) ?$barCode->dimensao: old('dimensao') }}">
        </div>
    </div>
</div>
