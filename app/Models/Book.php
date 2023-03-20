<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Book extends Model
{
    use HasFactory, Sluggable;
    protected $guarded = ['id'];
    protected $with = ['categories'];

    // pencarian dengan local scope
    public function scopeFilter($query, array $filters)
    {
        // Dengan if(isset..)
        // if(isset($filters['cari']) ? $filters['cari'] : false){
        //     return $query->where('judul', 'like', '%' . $filters['cari'] . '%')
        //             ->orWhere('penulis', 'like', '%' . $filters['cari'] . '%');
        // }

        // Dengan when()
        // $query->when($filters['cari'] ?? false, function($query, $cari){
        //     return $query->where('judul', 'like', '%' . $cari . '%')
        //             ->orWhere('penulis', 'like', '%' . $cari . '%');
        // });

        $query->when($filters['cari'] ?? false, function($query, $cari) {
            return $query->where(function($query) use ($cari) {
                 $query->where('judul', 'like', '%' . $cari . '%')
                             ->orWhere('penulis', 'like', '%' . $cari . '%');
             });
         });

        // Versi Callback
        // $query->when($filters['kategori'] ?? false, function($query, $kategori){
        //     return $query->whereHas('categories', function($query) use ($kategori){
        //         $query->where('name', $kategori);
        //     });
        // });

        // Versi arrow function
        $query->when($filters['kategori'] ?? false, fn($query, $kategori) =>
            $query->whereHas('categories', fn($query) =>
                $query->where('name', $kategori)
            )
        );
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'judul'
            ]
        ];
    }
}
