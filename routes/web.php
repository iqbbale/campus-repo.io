<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index']);

Route::get('/hello', function () {
return "Hello, World!";
});

// Route::get('/user/{id}', function ($id) {
// return "User ID: " . $id;
// });

// Route::get('/user/{name?}', function ($name = "Guest") {
// return "Hello, " . $name;
// });

Route::get('/dashboard', function () {
return view('dashboard');
})->name('dashboard');
// $url = route('dashboard'); // Menghasilkan URL dari rute yang diberi nama

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
    return "Admin Dashboard";
    });
    // Route::get('/users', function () {
    //     return "Admin Users";
    // });
});

Route::get('/data', function () {
    return "GET Request";
});

Route::post('/data', function () {
    return "POST Request";
});

Route::put('/data', function () {
    return "PUT Request";
});

Route::delete('/data', function () {
    return "DELETE Request";
});

Route::patch('/data', function () {
    return "PATCH Request";
});

Route::fallback(function () {
    return "404 - Not Found";
});


// Halaman login
Route::get('/login', function () {
    return view('login');
});

// Proses login
Route::post('/login', function () {
    $username = request('username');
    $password = request('password');

    // Login Admin
    if ($username === 'admin' && $password === 'admin123') {
        return redirect('/admin/dashboard');
    }

    // Login User
    if ($username === 'user' && $password === 'user123') {
        return redirect('/user/dashboard');
    }

    // Jika login gagal
    return back()->with('error', 'Username atau password salah!');
});

// Route Admin
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

// Route User
Route::prefix('user')->group(function () {
    Route::get('/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});
