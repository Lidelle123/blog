<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Annonce;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = ['name', 'description'];

    public function annonces(): HasMany
    {
        return $this->hasMany(Annonce::class);
    }
}
