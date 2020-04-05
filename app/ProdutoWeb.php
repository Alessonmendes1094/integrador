<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProdutoWeb extends Model
{
    protected $connection = 'mysql';

    protected $table = 'prod_cotacao';

    protected $guarded  = [];
}
