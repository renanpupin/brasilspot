<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Foto;
use Session;

class FotoController extends Controller
{

    public function index()
    {
        $fotos = Foto::all();
        return view('Foto.index')->with('fotos',$fotos);
    }


    public function create()
    {
        return view('Foto.Create');
    }


    public function store(Request $request)
    {

        $regras = array(
            'foto' => 'mimes:png'
        );

        $mensagens = array(
            'required' => 'O campo :attribute deve ser preenchido.',
            'mimes' => 'A imagem deve ser .png'
        );

        $this->validate($request, $regras, $mensagens);

        $foto = Foto::Create([
            'Foto' => ''
        ]);

        $nomeImage = $foto->id . '.' .
            $request->file('image')->getClientOriginalExtension();

        $request->file('image')->move(
            base_path() . '/public/images/', $nomeImage
        );

        $foto->foto = $nomeImage;
        $foto->save();

        Session::flash('flash_message', 'Foto adicionada com sucesso!');

        return redirect()->back();
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }

    public function upload() {
        // captura todos os arquivos do post
        $file = array('image' => Input::file('image'));
        // configura regras de upload
        $rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
        //configura validator
        $validator = Validator::make($file, $rules);
        if ($validator->fails()) {
            // redireciona para upload com mensagem de erro
            return Redirect::to('upload')->withInput()->withErrors($validator);
        }
        else {
            // checking file is valid.
            if (Input::file('image')->isValid()) {
                $destinationPath = 'uploads'; //nome da pasta
                $extension = Input::file('image')->getClientOriginalExtension(); // captura extensao da imagem
                $fileName = rand(1,99999).'.'.$extension; // renomeia
                Input::file('image')->move($destinationPath, $fileName); // faz upload do arquivo para a pasta
                // envia mensagem de volta de sucesso
                Session::flash('success', 'Upload concluido com sucesso.');
                return Redirect::to('upload');
            }
            else {
                // envia mensagem com erros
                Session::flash('error', 'Arquivo de upload inválido.');
                return Redirect::to('upload');
            }
        }
    }
}
