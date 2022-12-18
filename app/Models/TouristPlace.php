<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TouristPlace extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'tourist_places';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'place_name',
        'address',
        'description',
        'thumbnail_image_name',
        'thumbnail_image_path',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'tourist_place_id');
    }
}
