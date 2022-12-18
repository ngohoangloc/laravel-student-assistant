<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'images';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'image_name',
        'image_path',
        'edu_center_id',
        'motel_id',
        'dining_venue_id',
        'tourist_place_id'
    ];
}
