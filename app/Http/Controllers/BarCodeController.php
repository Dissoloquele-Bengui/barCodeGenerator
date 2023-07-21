<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BarCode;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Milon\Barcode\DNS1D;
use Picqer\Barcode\BarcodeGeneratorHTML;
class BarCodeController extends Controller
{
    //
    //


    //
    public function index()
    {
        $barCodes = BarCode::all();
        return view('admin.barCode.index',['barCodes'=>$barCodes]);
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
            for ($i = 0; $i < $qtdVezes; $i++) {
                do{
                    $codigo = mt_rand(1000000, 999999999);
                }while(BarCode::where('codigo',$codigo)->exists());
                $barCode = BarCode::create([
                    'dimensao' => $request->dimensao,
                    'codigo' => $codigo,
                ]);

            }


            //dd($barCode);
            $barCodes=BarCode::all();
            return view('admin.barCode.index',['barCodes'=>$barCodes]);
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
        return view('admin.barCode.edit.index',['barCodes'=>$barCodes]);
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
        return view('admin.barCode.edit.index',$data);
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
                'professor_disciplina_id'=> $request->professor_disciplina_id,
            ]);

            return redirect()->back()->with('Ano.update.success',1);

         } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Ano.update.error',1);
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
            return redirect()->back()->with('Ano.destroy.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Ano.destroy.error',1);
        }
    }

    public function purge($id)
    {
        //
        try {
            //code...
            $barCode = BarCode::findOrFail($id);
            BarCode::findOrFail($id)->forceDelete();
            return redirect()->back()->with('Ano.purge.success',1);
        } catch (\Throwable $th) {
            //throw $th;
            return redirect()->back()->with('Ano.purge.error',1);
        }
    }
}
