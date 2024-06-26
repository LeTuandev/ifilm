<?php

namespace App\Models;

use App\Enums\MovieType;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Pagination\LengthAwarePaginator;

class Movie extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'code',
        'name',
        'type',
        'show_time',
        'video_duration',
        'actors',
        'director',
        'video_url',
        'age_limit',
        'description',
        'image',
    ];

    protected $appends = [
        'full_date'
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function cinemas(): BelongsToMany 
    {
        return $this->belongsToMany(Cinema::class, 'cinema_movie', 'movie_id', 'cinema_id');
    }

    public function startDate(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->format('d/m/Y'),
        );    
    }

    public function endDate(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => Carbon::parse($value)->format('d/m/Y'),
        );    
    }

    public function type(): Attribute 
    {
        return Attribute::make(
            get: function ($value) {
                $typeEnum = MovieType::from($value);
                return $typeEnum->getNameOfType() ?? '';
            },
        );    
    }

    public function getFullDateAttribute(): string
    {
        return ($this->start_date && $this->end_date) ? ($this->start_date . '-' . $this->end_date) : '';
    }

    public static function getListMovies(string | null $search = ''): LengthAwarePaginator
    {
        return self::query()
            ->with(['cinemas'])
            ->when($search, function ($q) use ($search) {
                return $q->where('code', 'LIKE', '%' . $search . '%')
                        ->orWhere('name', 'LIKE', '%' . $search . '%')
                        ->orWhere('actors', 'LIKE', '%' . $search . '%')
                        ->orWhere('director', 'LIKE', '%' . $search . '%');
            })
            ->paginate(10)
            ->appends(['search' => $search]);
    }
}
