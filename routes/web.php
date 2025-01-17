<?php
// Mengambil data dari Models\Post
use App\Models\Post;
use App\Models\User;
use App\Models\Kategori;
// Untuk menggunakan class Arr dari laravel
use Illuminate\Support\Arr;
// Fungsi Utama dari route
use Illuminate\Support\Facades\Route;

// Membuat rute untuk menambahkan view beserta data yang ada
Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});

Route::get('/posts', function () {
    return view('posts', [
        'title' => 'Blog Pages',
        'posts' => Post::filter(request(['search', 'kategori', 'author']))
            ->latest()
            ->paginate(5)
            ->withQueryString(),
    ]);
});

// Rute untuk mendapatkan param dari post *wildcard{id}; gunakan slug untuk keamanan database
Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', ['title' => 'Detailed Post', 'post' => $post]);
});

Route::get('/authors/{user:username}', function (User $user) {
    /*
     LazyEagerLoading dilakukan ketika parent sudah dipanggil, load()
     $posts = $user->posts->load('kategori', 'author');
    */
    return view('posts', ['title' => count($user->posts) . ' Articles By ' . $user->name, 'posts' => $user->posts]);
});

Route::get('/kategoris/{kategori:slug}', function (Kategori $kategori) {
    // $posts = $kategori->posts->load('kategori', 'author');
    return view('posts', ['title' => 'Artikel Kategori :  ' . $kategori->name, 'posts' => $kategori->posts]);
});

/*
Route::get('/about', function () {
    return view('about', ['title' => 'About Page', 'name' => 'Sucipto']);
});

jika dilakukan lazy loading di routes
    studi kasus n+1 lazyloading menggunakan eager loading yaitu with()
    select from=get(),
    $posts = Post::with(['author', 'kategori'])->latest()->get();
*/
