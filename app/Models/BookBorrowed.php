<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookBorrowed extends Model
{
    use HasFactory;

    protected $fillable = [
      'book_id',
      'member_id',
      'dateborrowed',
      'datereturned',
    ];

    public function book(){
     return $this->belongsTo(Book::class);
    }

    public function member(){
      return $this->belongsTo(Member::class);
    }
}
