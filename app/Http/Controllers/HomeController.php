<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Jualtanah;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $product = Product::all();
        return view('home', compact('product'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $jualtanahs = Jualtanah::all();
        $countBerjalan=Jualtanah::where('status',0)->get()->count();
        $countBerhasil=Jualtanah::where('status',1)->get()->count();
        $countGagal=Jualtanah::where('status',2)->get()->count();
        
        return view('adminHome', compact('jualtanahs','countBerjalan','countBerhasil','countGagal'));
    }
}
