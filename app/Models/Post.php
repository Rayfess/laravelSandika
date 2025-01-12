<?php

// supaya class bisa terpanggil, gunakanlah namespace
namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Arr;

class Post extends Model
{
  use HasFactory;
  // gunakan $with untuk eager ke seluruh anak model atau model ini
  protected $with = ['author', 'kategori'];
  protected $table = 'blog_posts';
  protected $fillable = ['title', 'author', 'slug', 'text'];

  public function author(): BelongsTo
  {
    return $this->belongsTo(User::class);
  }
  public function kategori(): BelongsTo
  {
    return $this->belongsTo(Kategori::class);
  }
  public function scopeFilter(Builder $query, array $filters)
  {
    // nullqualising operator
    $query->when(
      $filters['search'] ?? false,
      fn($query, $search) =>
      $query->where('title', 'like', '%' . $search . '%'),
    );

    $query->when(
      $filters['kategori'] ?? false,
      fn($query, $kategori) =>
      $query->whereHas('kategori', fn($query) => $query->where('slug', $kategori)),
    );

    $query->when(
      $filters['author'] ?? false,
      fn($query, $author) =>
      $query->whereHas('author', fn($query) => $query->where('username', $author)),
    );
  }
}

/*
scope filter depracated
$query->when($filters['search'] ?? false, function ($query, $search) {
  $query->where('title', 'like', '%' . request('search') . '%');
});
*/


























/*
contoh mengambil database tanpa database
 class Post
 {
   public static function all()
   {
     return [
       [
         'id' => '1',
         'slug' => 'judul-artikel-1',
         'title' => 'Judul Artikel 1',
         'author' => 'Mr Yadi',
         'text' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, quidem sapiente possimus beatae maxime odio perspiciatis provident. Facilis deserunt facere a rem, quod amet ab laudantium quaerat dolorum cupiditate quos iste, atque doloribus delectus repudiandae dolores nulla sint dolor quae quibusdam? Asperiores fugiat soluta sequi illum vero fuga corporis dolor.',
       ],
       [
         'id' => '2',
         'slug' => 'judul-artikel-2',
         'title' => 'Judul Artikel 2',
         'author' => 'Miss Yanti',
         'text' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, quidem sapiente possimus beatae maxime odio perspiciatis provident. Facilis deserunt facere a rem, quod amet ab laudantium quaerat dolorum cupiditate quos iste, atque doloribus delectus repudiandae dolores nulla sint dolor quae quibusdam? Asperiores fugiat soluta sequi illum vero fuga corporis dolor. Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo, quidem sapiente possimus beatae maxime odio perspiciatis provident.',
       ]
     ];
   }
   // Membuat Method Find untuk dipakai di controller
   public static function find($slug): array // return time untuk memperjelas ketika ada error
   {
   // Menggunakan Callback
   // return Arr::first(static::all(), function ($post) use ($slug) {
   //   return $post['slug'] == $slug; // == true ketika isi dari string atau int sama, kecuali ===
   // });

     // Menggunakan Arrow Func
     $post = Arr::first(static::all(), fn($post) => $post['slug'] == $slug);
     if (!$post) {
       abort(404);
     }
     return $post;
   }
 };
 static sama dengan memanggil method di kelas yang sama, contoh this
*/