<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Motel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'motels';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'motel_name',
        'owner_name',
        'owner_phone',
        'price',
        'status',
        'thumbnail_image_name',
        'thumbnail_image_path',
        'address',
        'description',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'motel_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'motel_id')->whereNull('parent_id');
    }
}
