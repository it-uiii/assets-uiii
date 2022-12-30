<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Echo_;

class ReportsController extends Controller
{
    public function index()
    {
        // return view('assets.reports', ['title' => 'Inventaris', 'subtitle' => 'Reports']);

        return 'hello world';
    }
}
