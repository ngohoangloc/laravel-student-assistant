<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Menu extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'menus';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'item',
        'price',
        'dining_venue_id',
    ];

     /**
     * The belongs to Relationship
     *
     * @var array
     */
    public function dining_venues()
    {
        return $this->belongsTo(DiningVenue::class);
    }
}
