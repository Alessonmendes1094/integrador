<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prod_Preco extends Model
{
    protected $connection = 'mysql';

    protected $table = 'prod_preco';

    protected $guarded  = [];
}
