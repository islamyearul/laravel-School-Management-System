<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeesCategory extends Model
{
    use HasFactory;
    protected $fillable = ['fees_cat_name'];
}
