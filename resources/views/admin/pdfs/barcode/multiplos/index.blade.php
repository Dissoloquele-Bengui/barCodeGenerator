<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Códigos de Barras</title>
        <style>
            td{
                padding:15px !important;
                border:0;
                width:200px;
                height:100px;

            }
            table{
                border:0;
            }
        </style>
</head>
<body>
    <table>
        @php $i = 0; @endphp
        @foreach ($barCodes as $barCode)
            @if ($i % 4 === 0)
                <tr>
            @endif
            <td >
                <img src="data:image/png;base64,{{ base64_encode($gerador->getBarcode($barCode->codigo, $gerador::TYPE_CODABAR,$barCode->largura*0.99,$barCode->altura*15)) }}" class="barcode->image" alt="Código de Barras" style="width:8px !important" >
                <div class="barcode-text">
                    <p>{{ $barCode->codigo }}</p>
                </div>
            </td>
            @php $i++; @endphp
            @if ($i % 4 === 0 || $loop->last)
                </tr>
            @endif
        @endforeach
    </table>
</body>
</html>
