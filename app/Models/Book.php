<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'bookshelf_id',
        'name',
        'description'
    ];
    public function bookshelf()
    {
        return $this->hasOne(Bookshelf::class, 'id', 'bookshelf_id');
    }
}
