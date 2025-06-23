<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasUuids;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable = ['name', 'slug', 'description'];

    public function products(){
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

        public static function boot()
    {
        parent::boot();
        static::creating(function ($category) {
            // Générer un slug à partir du titre
            $slug = Str::slug($category->name);

            // Vérifier si le slug existe déjà et ajouter un suffixe
            $count = Category::where('slug', $slug)->count();
            if ($count) {
                $slug .= '-' . ($count + 1);
            }

            $category->slug = $slug;
        });
    }
}
