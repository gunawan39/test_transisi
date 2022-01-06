<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use PDF;
class EmployesController extends Controller
{
    //

    public function index()
    {

        // $employes = DB::table('employees')->paginate(5);

        $employes = DB::table('employees')
            ->join('companies', 'companies.id', '=', 'employees.company','LEFT')
            ->select('employees.*', 'companies.nama as company')
            ->orderBy('employees.id','DESC')
            ->paginate(5);
            // s
 
    	// mengirim data employes ke view index
    	return view('employes/index',['employes' => $employes]);
        // return view('home');
    }
    public function tambah()
    {
    
        // memanggil view tambah

    	$companies = DB::table('companies')->get();
        return view('employes/tambah',['companies' => $companies]);
    
    }
    // method untuk insert data ke table employes
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required'
        ]);
        // insert data ke table companies
        DB::table('employees')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'company' => $request->company
        ]);
        // alihkan halaman ke halaman employes
        return redirect('employes/index');
    
    }
    // method untuk hapus data employes
    public function hapus($id)
    {
        // menghapus data employes berdasarkan id yang dipilih
        DB::table('employees')->where('id',$id)->delete();
            
        // return redirect('home');
        return response()->json([
            'message' => '200',
            'alert-type' => 'success'
            
        ]);
        // return back();
    }
    // method untuk edit data companies
    public function edit($id)
    {

    	$companies = DB::table('companies')->get();
        // mengambil data employes berdasarkan id yang dipilih
        $employes = DB::table('employees')->where('id',$id)->get();
        // passing data employes yang didapat ke view edit.blade.php
        return view('employes/edit',['employes' => $employes,'companies' => $companies]);
    
    }
    public function update(Request $request)
    {

        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required'
        ]);
        // update data employes
        DB::table('employees')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'company' => $request->company
        ]);
        // alihkan halaman ke halaman employes
        return redirect('employes/index');
    }
    public function cetak_pdf()
    {
    
    	$employes = DB::table('employees')->get();
        $pdf = PDF::loadview('employes/output/cek_pdf',['employes'=>$employes]);
        return $pdf->download('employes/output/laporan-companies-pdf');
    }
}
