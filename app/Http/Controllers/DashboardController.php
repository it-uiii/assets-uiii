<?php

namespace App\Http\Controllers;

use App\Models\items;
use App\Models\Menu;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $menu       = new Menu();
        $barang     = DB::table('items')->count();
        $supplier   = DB::table('suppliers')->count();
        $locations  = items::all();

        $sidebar_menu = $menu->getMenu();
        return view('index', $sidebar_menu, [
            'title'     => 'Home',
            'subtitle'  => 'Dashboard',
            'items'     => $barang,
            'suppliers' => $supplier,
            'locations' => $locations
        ]);
    }
}
