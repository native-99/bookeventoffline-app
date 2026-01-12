<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str; // Jangan lupa ini

class Workshop extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'thumbnail',
        'venue_thumbnail',
        'bg_map',
        'address',
        'about',
        'price',
        'is_open',
        'has_started',
        'started_at',
        'time_at',
        'category_id',
        'workshop_instructor_id',
    ];

    protected $casts = [
        'started_at' => 'date',
        'time_at' => 'datetime:H:i',
    ];

    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function benefits()
    {
        return $this->hasMany(WorkshopBenefit::class);
    }

    public function participants()
    {
        return $this->hasMany(WorkshopParticipant::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function instructor()
    {
        // Parameter kedua adalah nama kolom foreign key yang custom
        return $this->belongsTo(WorkshopInstructor::class, 'workshop_instructor_id');
    }
}
