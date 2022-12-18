<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiningVenue extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'dining_venues';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'venue_name',
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
        return $this->hasMany(Image::class, 'dining_venue_id');
    }

    public function menus()
    {
        return $this->hasMany(Menu::class, 'dining_venue_id');
    }
}
