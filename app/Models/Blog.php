<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected  $guarded = [];

    public function category() // This is the function for the relationship between blog and blog category
    {
        return $this->belongsTo(BlogCategory::class, 'blog_category_id', 'id');
    }
}
