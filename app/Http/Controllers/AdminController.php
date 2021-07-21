<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penduduk;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    
    public function index()
    {
        $data = Penduduk::all();
        return view('home', compact('data'));
    }
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('penduduk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->pas_foto);
        $request->validate([
            'nik' => 'required|numeric|digits:16|unique:penduduks',
            'nama' => 'required|string',
            'jk' => 'required|string',
            'jln' => 'required|string',
            'rt_rw' => 'required|string',
            'desa' => 'required|string',
            'kecamatan' => 'required|string',
            'kab_kota' => 'required|string',
            'agama' => 'required|string',
            'pekerjaan' => 'required|string',
            'pas_foto' => 'required|mimes:jpeg,bmp,jpg,PNG,gif,png|max:2048',
        ]);
       
            $imgname = $request->pas_foto->getClientOriginalName();
            $request->pas_foto->move(public_path('images'), $imgname);

        Penduduk::create([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'jln' => $request->jln,
            'rt_rw' => $request->rt_rw,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kab_kota' => $request->kab_kota,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'pas_foto' => $imgname,
        ]);

        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Penduduk::where('id', $id)->first();
        return view('penduduk.edit', compact('data'));
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
        
        $request->validate([
            'nik' => 'numeric',
            'nama' => 'string',
            'jk' => 'string',
            'jln' => 'string',
            'rt_rw' => 'string',
            'desa' => 'string',
            'kecamatan' => 'string',
            'kab_kota' => 'string',
            'agama' => 'string',
            'pekerjaan' => 'string',
            'pas_foto' => 'mimes:jpeg,bmp,jpg,PNG,gif,png|max:2048',
        ]);
        $data = Penduduk::where('id', $id)->first();
        
        if ($request->pas_foto != NULL) {
            $imgname = $request->pas_foto->getClientOriginalName();
            $request->pas_foto->move(public_path('images'), $imgname);
        }else{
            $imgname = $data->pas_foto;
        }

        Penduduk::find($id)->update([
            'nik' => $request->nik,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'jln' => $request->jln,
            'rt_rw' => $request->rt_rw,
            'desa' => $request->desa,
            'kecamatan' => $request->kecamatan,
            'kab_kota' => $request->kab_kota,
            'agama' => $request->agama,
            'pekerjaan' => $request->pekerjaan,
            'pas_foto' => $imgname,
        ]);

        return redirect()->route('home');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = Penduduk::destroy($id);
        
        return redirect()->route('home')->with('status-danger', 'Data Berhasil di Delete !');;
    }
}
