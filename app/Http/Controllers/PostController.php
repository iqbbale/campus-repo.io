<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Data buatan langsung (tanpa perlu database/Prisma)
        $posts = [
            (object)[
                'id' => 1,
                'title' => 'Judul Post Pertama',
                'content' => 'Ini adalah konten artikel pertama.'
            ],
            (object)[
                'id' => 2,
                'title' => 'Judul Post Kedua',
                'content' => 'Ini adalah konten artikel kedua.'
            ],
        ];

        return view('index', compact('posts'));
    }
}
