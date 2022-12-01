<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Job extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'jobs';

    protected $primaryKey = 'id';

    protected $fillable = ['id', 'name', 'company_name', 'address', 'phone', 'job_type', 'job_level', 'salary', 'job_description', 'job_requirement'];
}
