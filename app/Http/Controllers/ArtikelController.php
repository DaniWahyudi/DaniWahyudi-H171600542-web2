<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriArtikel;

use App\Artikel;
class ArtikelController extends Controller
{
	
    public function index(){
    	$Artikel=Artikel::all();

    	return view ('artikel.index',compact('Artikel'));
    }
    public function show($id){
    	$Artikel=Artikel::find($id);
    	return view ( 'artikel.show',compact('Artikel'));

    }
    public function create(){
       $KategoriArtikel=KategoriArtikel::pluck('nama','id');

    	return view ( 'artikel.create', compact('KategoriArtikel'));
    }
    public function store(Request $request){
    	$input=$request->all();
    	Artikel::create($input);
    	return redirect(route('artikel.index'));
    }
    public function destroy($id){
        $Artikel = Artikel::find($id);

        $Artikel->delete();

        return redirect(route('artikel.index'));
    }
    
    public function edit($id){
        $Artikel=Artikel::find($id);
        $KategoriArtikel=KategoriArtikel::pluck('nama','id');
        return view('artikel.edit', compact('KategoriArtikel','Artikel'));

    }
    public function update($id, Request $request){
        $Artikel=Artikel::find($id);
        $input=$request->all();

    
        $Artikel->update($input);

        return redirect(route('artikel.index'));
    }
}
