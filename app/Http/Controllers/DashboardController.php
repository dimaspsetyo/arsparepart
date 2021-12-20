<?php

namespace App\Http\Controllers;

use App\Models\Sparepart;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sparepart = Sparepart::all();
        $var_title = "ARSparepart | Dashboard";
        return view('dashboard', compact('var_title'), compact('sparepart'));
    }
    public function objek($id)
    {
        $sparepart = Sparepart::find($id);

        $var_title = "ARSparepart | Scan Objek";
        return view('objek', compact('var_title'), compact('sparepart'));
    }
    public function video()
    {
        $sparepart = Sparepart::all();

        $var_title = "ARSparepart | Scan Video";
        return view('video', compact('var_title'), compact('sparepart'));
    }
}
