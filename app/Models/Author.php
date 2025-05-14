<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Author extends Model
{
    use Notifiable;
    use HasFactory;
    protected $fillable=['name', 'firstname', 'biography'];

    public function books(){
      return $this->hasMany(Book::class);
    }
}
