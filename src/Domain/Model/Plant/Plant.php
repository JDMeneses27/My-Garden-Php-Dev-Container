<?php

declare(strict_types=1);

namespace App\Domain\Model\Plant;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
    protected $table = 'plantas';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = ['nombre', 'familia', 'categoria'];
}
