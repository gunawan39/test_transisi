<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use PDF;
use Alert;
class CompanyController extends Controller
{
    //
    public function index()
    {

    	// $companies = DB::table('companies')->get();
        $companies = DB::table('companies')->paginate(5);
 
    	// mengirim data company ke view index
    	return view('company/index',['companies' => $companies]);
        // return view('home');
    }
    public function tambah()
    {
    
        // memanggil view tambah
        return view('company/tambah');
    
    }
    // method untuk insert data ke table company
    public function store(Request $request)
    {
        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required'
        ]);
        // insert data ke table companies
        DB::table('companies')->insert([
            'nama' => $request->nama,
            'email' => $request->email,
            'logo' => $request->logo,
            'website' => $request->website
        ]);
        // alihkan halaman ke halaman company
        return redirect('company/index');
    
    }
    // method untuk hapus data company
    public function hapus($id)
    {
        // menghapus data company berdasarkan id yang dipilih
        DB::table('companies')->where('id',$id)->delete();
            
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

        // mengambil data company berdasarkan id yang dipilih
        $company = DB::table('companies')->where('id',$id)->get();
        // passing data company yang didapat ke view edit.blade.php
        return view('company/edit',['company' => $company]);
    
    }
    public function update(Request $request)
    {

        $this->validate($request,[
            'nama' => 'required',
            'email' => 'required'
        ]);
        // update data company
        DB::table('companies')->where('id',$request->id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'logo' => $request->logo,
            'website' => $request->website
        ]);
        // alihkan halaman ke halaman company
        return redirect('company/index');
    }
    public function cetak_pdf()
    {
    
    	$companies = DB::table('companies')->get();
        $pdf = PDF::loadview('company/output/cek_pdf',['companies'=>$companies]);
        return $pdf->download('company/output/laporan-companies-pdf');
    }
}
