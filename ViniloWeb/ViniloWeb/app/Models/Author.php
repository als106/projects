<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    use HasFactory;

    protected $table = "authors";

    protected $fillable = [
        'name',
        'description',
        'img',
    ];

    public function products() {
        return $this->hasMany(Product::class); 
    }

    public function genre() {
        return $this->belongsTo(Genre::class);
    }

    public function rules(){
        return ['name' => 'required|unique:authors,name',
                'description' => 'required'];
    }
}
