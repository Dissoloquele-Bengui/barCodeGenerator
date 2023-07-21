<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body><!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Etiqueta com Código de Barras</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
            }
            .row {
                width: 10cm; /* Ajuste o tamanho total da etiqueta conforme necessário */
                height: 5.5cm; /* Ajuste o tamanho total da etiqueta conforme necessário */
                margin: 0.5cm auto;
                border: 1px solid #000;
                padding: 0.5cm;
                box-sizing: border-box;
                position: relative;
                display:flex;
            }
            .barcode {
                position: absolute;
                bottom: 0;
                left: 0;
                width: 4cm; /* Tamanho do espaço reservado para o código de barras */
                height: 2.5cm; /* Tamanho do espaço reservado para o código de barras */
                border: 1px solid #000;
            }
            .content {
                padding-top: 1cm; /* Espaçamento acima do código de barras */
            }
        </style>
    </head>
    <body>
        <div class="row">
            @foreach ($barCodes as $barCode)
                <div class="barcode">
                <p class="mb-0 text-muted" > <strong id="codeBar">{!!DNS1D::getBarcodeHTML("$barCode->codigo",'CODABAR',0.4*$barCode->largura,40*$barCode->altura)!!}</strong> </p>
                </div>
                <div class="content">
                    <p> {{ $barCode->codigo }}</p>
                </div>
            @endforeach
        </div>
    </body>
    </html>

    .row
</body>
</html>
