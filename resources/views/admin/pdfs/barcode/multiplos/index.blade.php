<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Códigos de Barras</title>
</head>
<body>
    <div class="container">
        <h1 class="my-4">Códigos de Barras</h1>

        <div class="row d-flex col-12">

            @foreach ($barCodes as $barCode)
                <div class="" >
                    <div class="card col-4" style="width:5px !important">
                        <img src="data:image/png;base64,{{ base64_encode($gerador->getBarcode($barCode->codigo, $gerador::TYPE_CODE_128,$barCode->largura,$barCode->altura*15)) }}" class="card-img-top col-12" alt="Código de Barras" style="width:8px !important" >
                        <div class="  col-12 " style="width:10px !important  ">
                            <p style="padding-left:20px"  class=" d-flex justify-text-center" >{{ $barCode->codigo }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
