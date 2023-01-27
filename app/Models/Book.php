<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Book extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'books';

    public $fillable = ['title','pages','published_at','publisher_id'];

    protected $dates = ['created_at','updated_at','deleted_at','published_at'];

    public function rules(){
        return 
        [
            'title' => 'required',
            'pages' => 'required',
            'publisher_id' => 'required',
            'published_at' => 'required',
        ];
    } 
    
    public function publisher(){
        return $this->belongsTo(Publisher::class);
    }

    public function author(){
        return $this->belongsTo(Author::class);
    }
}
