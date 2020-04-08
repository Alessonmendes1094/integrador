<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cotacao extends Model
{
    protected $connection = 'mysql';

    protected $table = 'cotacoes';

    protected $guarded = [];

}
