<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $table = "genres";

    protected $fillable = [
        'name'
    ];

    public function products() {
        return $this->hasMany(Product::class);
    }

    public function authors() {
        return $this->hasMany(Author::class);
    }

    public function rules(){
        return [
            'name' => 'required|unique:genres,name'
        ];
    }
}