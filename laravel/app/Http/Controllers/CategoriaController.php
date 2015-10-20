<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Categoria;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Controller;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();

        return view('Categoria.Index')->with('categorias',$categorias);
    }


    public function create()
    {
        return view('Categoria.Create');
    }


    public function store(Request $request)
    {
        //
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
}
