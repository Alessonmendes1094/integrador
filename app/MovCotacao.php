<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovCotacao extends Model
{
    protected $connection = 'pgsql';

    protected $table = 'movcotacao';

    protected $guarded    = [];
    
    protected $primaryKey = null;

    public $incrementing = false;

    public $timestamps = false;
}
