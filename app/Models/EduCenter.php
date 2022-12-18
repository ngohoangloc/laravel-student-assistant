<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EduCenter extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'edu_centers';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'center_name',
        'address',
        'thumbnail_image_name',
        'thumbnail_image_path',
        'center_phone',
        'center_website',
        'description',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'edu_center_id');
    }
}
