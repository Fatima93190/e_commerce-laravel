<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Product extends Model
{
    use HasUuids;
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
    protected $fillable=['name', 'slug', 'description', 'price', 'image', 'category_id'];

    public function categorie(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

        // Créer un slug automatiquement avant la création du product
    public static function boot()
    {
        parent::boot();
        static::creating(function ($product) {
            // Générer un slug à partir du titre
            $slug = Str::slug($product->name);

            // Vérifier si le slug existe déjà et ajouter un suffixe
            $count = Product::where('slug', $slug)->count();
            if ($count) {
                $slug .= '-' . ($count + 1);
            }

            $product->slug = $slug;
        });
    }
}
