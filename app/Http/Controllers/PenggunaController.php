<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use PDF;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('data-pengguna.index', compact('user'));
    }

    public function input(Request $request)
    {
        return view("data-pengguna.formInput");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
            'namaLengkap' => $request->namaLengkap,
            'alamat' => $request->alamat,
            'role' => $request->role,
        ]);

        return redirect()->route('data-pengguna')->with('success', 'Data berhasil disimpan');
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
        $user = User::findorfail($id);
        return view('data-pengguna.formEdit', compact('user'));
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
        $user = User::findorfail($id);
        $user->update($request->all());

        return redirect()->route('data-pengguna')->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findorfail($id);

        $user->delete();

        return redirect()->route('data-pengguna')->with('success', 'Data berhasil dihapus');
    }

    //untuk mengekspor data atau konten ke dalam format PDF
    public function export_pdf(Request $request)
    {
        //DECLARE REQUEST
        //QUERY
        $user = User::select('*');
        
        $user = $user->get();

        // Meneruskan parameter ke tampilan ekspor
        $pdf = PDF::loadview('data-pengguna.exportPdf', ['user'=>$user]);
        $pdf->setPaper('a4', 'portrait');
        $pdf->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        // SET FILE NAME
        $filename = date('YmdHis') . '_data_pengguna';
        // untuk mendownload file pdf
        return $pdf->download($filename.'.pdf');
    }
}
