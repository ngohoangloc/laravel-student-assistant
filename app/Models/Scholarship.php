<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Scholarship extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'scholarships';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'quantity',
        'value',
        'description',
        'documents',
        'application_deadline',
        'user_id',
        'college_id',
    ];
}
