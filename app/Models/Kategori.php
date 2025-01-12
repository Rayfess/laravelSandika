<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Kategori extends Model
{
    use HasFactory;
    /**
     * Get all of the comments for the Kategori
     *
     * @return 
     */
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
        // memiliki keterikatan dengan tabel Post
    }
    protected $table = "kategoris";
    protected $fillable = ['name', 'slug'];
}
