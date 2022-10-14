<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\Isset_;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use HasFactory, Sluggable;
    // $fillable berfungsi untuk mendefinisikan variabel2 yang hanya bisa diisi, di bawah ini variabel yang bisa diinisialisasikan hanya title, excerpt, dan body
    // protected $fillable=['title', 'excerpt', 'body'];

    //guarded berfungsi untuk melindungi suatu variabel yang tidak perlu diisi. di bawah ini $id tidak perlu diisi ketika insert data.
    protected $guarded = ['id'];
    // eager loading dengan load author dan category
    protected $with = ['author', 'category'];

    public function scopeFilter($query, array $filters)
    {
        // if (Isset($filters['search']) ? $filters['search'] : false) {
        //     return $query->where('title', 'like', '%' . $filters['search'] . '%')
        //         ->orwhere('body', 'like', '%' . $filters['search'] . '%');
        // }

        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orwhere('body', 'like', '%' . $search . '%');
            });
        });

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('slug', $category);
            });
        });

        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', $author)
            )
        );
    }
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // public function user()
    // {
    //     return $this->belongsTo(User::class);
    // }

    public function author()
    {
        //, user_id menandakan sebagai yg di rujuk dari User walaupun di ubah menjadi author
        return $this->belongsTo(User::class, 'user_id');
    }
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
