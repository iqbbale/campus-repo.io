<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Data buatan langsung (tanpa perlu database/Prisma)
        $posts = [
            (object)[
                'id' => 1,
                'title' => 'Dasboard Pertama',
                'content' => 'Ini adalah konten artikel pertama.'
            ],
        ];

        return view('index', compact('posts'));
    }
}
