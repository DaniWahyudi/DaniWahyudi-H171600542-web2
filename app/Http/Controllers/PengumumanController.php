<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\KategoriPengumuman;

use App\Pengumuman;
class PengumumanController extends Controller
{
    
    public function index(){
        $Pengumuman=Pengumuman::all();

        return view ('pengumuman.index',compact('Pengumuman'));
    }
    public function show($id){
        $Pengumuman=Pengumuman::find($id);
        return view ( 'pengumuman.show',compact('Pengumuman'));

    }
    public function create(){
       $KategoriPengumuman=KategoriPengumuman::pluck('nama','id');

       return view ( 'pengumuman.create',compact('KategoriPengumuman'));
    }
    public function store(Request $request){
        $input=$request->all();
        Pengumuman::create($input);
        return redirect(route('pengumuman.index'));
    }
    public function destroy($id){
        $Pengumuman = Pengumuman::find($id);

        $Pengumuman->delete();

        return redirect(route('Pengumuman.index'));
    }
    public function edit($id){
        $Pengumuman=Pengumuman::find($id);
        $KategoriPengumuman=KategoriPengumuman::pluck('judul','id');
        return view('pengumuman.edit', compact('KategoriPengumuman','Pengumuman'));

    }
    public function update($id, Request $request){
        $Pengumuman=Pengumuman::find($id);
        $input=$request->all();

    
        $Pengumuman->update($input);

        return redirect(route('pengumuman.index'));
    }

}
