<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MovCotacao extends Model
{
    protected $connection = 'pgsql';

    protected $table = 'movcotacao';

    protected $guarded = [];

    public $timestamps = false;
}
