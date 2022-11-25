<?php

namespace App\Http\Controllers;

use App\Models\items;
use App\Models\logistik;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $menu       = new Menu();
        $barang     = DB::table('items')->count();
        $supplier   = DB::table('suppliers')->count();
        $lokasi     = DB::table('lokasis')->count();
        $locations  = items::all();
        $logistic   = logistik::count();

        $sidebar_menu = $menu->getMenu();
        return view('index', $sidebar_menu, [
            'title'     => 'Home',
            'subtitle'  => 'Dashboard',
            'items'     => $barang,
            'suppliers' => $supplier,
            'locations' => $locations,
            'loc'       => $lokasi,
            'logistic'  => $logistic,
        ]);
    }
}
