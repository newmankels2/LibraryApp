<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',
      'Author',
      'book_type_id',
      'title',
      'Availability',
    ];

    public function book_type(){
      return $this->belongsTo(BookType::class);
    }
    
}
