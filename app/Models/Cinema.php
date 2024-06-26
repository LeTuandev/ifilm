<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\LengthAwarePaginator;

class Cinema extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'name',
        'address'
    ];

    public function movies(): BelongsToMany 
    {
        return $this->belongsToMany(Movie::class, 'cinema_movie', 'cinema_id', 'movie_id');    
    }

    public static function getListCinemas(string | null $search = ''): LengthAwarePaginator
    {
        return self::query()
            ->with(['movies'])
            ->when($search, function ($q) use ($search) {
                return $q->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('address', 'LIKE', '%' . $search . '%');
            })
            ->paginate(10)
            ->appends(['search' => $search]);    
    }
}
