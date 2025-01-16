<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $fillable = ['content'];

    // Categoriesテーブルのcontentを返すメソッド
    public function getContent() {
        return $this->content;
    }
}