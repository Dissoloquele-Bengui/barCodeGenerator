<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarCode;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Milon\Barcode\DNS1D;
use Picqer\Barcode\BarcodeGeneratorHTML;
use PDF;
use Picqer\Barcode\BarcodeGeneratorPNG;


class BarCodeController extends Controller
{
    //
    //


    //
    public function index()
    {
        $data['barCodes'] = BarCode::all();
        $data['generator']=new BarcodeGeneratorHTML();
        return view('admin.barCode.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.barCode.create.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        try {
            //dd($request);
            // Certifique-se de converter $request->qtd para um número inteiro
            $qtdVezes = (int) $request->qtd;
            $codigos = array();
            $barCodes = array();
            $barCodesGerados = array();
            for ($i = 0; $i < $qtdVezes; $i++) {
                do {
                    $codigo = mt_rand(1, 999);
                } while (BarCode::where('codigo', $codigo)->exists());
                array_push($codigos, $codigo);
                $barCode = BarCode::create([
                    'codigo' => $codigo,
                    'altura' => $request->altura,
                    'largura' => $request->largura,
                ]);
                array_push($barCodes, $barCode);

            }
            $dados['gerador']=new BarcodeGeneratorPNG();
            $dados['barCodes'] = $barCodes;
            //dd($dados["barCodes"] );
            $html = view("admin/pdfs/barcode/multiplos/index", $dados);
            $css = file_get_contents("css/bootstrap.min.css");
            $css1 = file_get_contents("css/style.css");
            $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => "A4-P"]);
            $mpdf->SetFont("arial");
            $mpdf->setHeader();
            $mpdf->AddPage();
            $mpdf->WriteHTML($css, \Mpdf\HTMLParserMode::HEADER_CSS);
            $mpdf->WriteHTML($css1, \Mpdf\HTMLParserMode::HEADER_CSS);
            $mpdf->WriteHTML($html);
            $mpdf->Output("Codigos_de_barra_multiplos" . ".pdf", "I");
            //
            return redirect()->back()->with('Ano.create.error', 1);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('Ano.create.error', 1);
        }
    }
    public function verify(Request $request)
    {

        try {
            //dd($request);
            // Certifique-se de converter $request->qtd para um número inteiro
            $barCode = BarCode::where('codigo', $request->codigo)->first();
            //dd($barCode);

            return view('admin.barCode.verify', ['barCode' => $barCode]);
            //dd($barCode);
        } catch (\Throwable $th) {
            throw $th;
            dd($th);
            return redirect()->back()->with('Ano.create.error', 1);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $barCodes = BarCode::findOrfail($id);
        return view('admin.barCode.edit.index', ['barCodes' => $barCodes]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data['barCodes'] = BarCode::find($id);
        $data['periodos'] = Periodo::all();
        return view('admin.barCode.edit.index', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        //


        try {
            //code...
            $barCode = BarCode::findOrFail($id)->update([
                'horario_id' => $request->horario_id,
                'turma_id' => $request->turma_id,
                'professor_disciplina_id' => $request->professor_disciplina_id,
            ]);

            return redirect()->back()->with('Ano.update.success', 1);

        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Ano.update.error', 1);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            //code...
            $barCode = BarCode::findOrFail($id);
            BarCode::findOrFail($id)->delete();
            return redirect()->back()->with('Ano.destroy.success', 1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Ano.destroy.error', 1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $barCode = BarCode::findOrFail($id);
            BarCode::findOrFail($id)->forceDelete();
            return redirect()->back()->with('Ano.purge.success', 1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Ano.purge.error', 1);
        }
    }
}
