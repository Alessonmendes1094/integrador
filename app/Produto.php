<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $connection = 'pgsql';

    protected $table = 'prodcotacao';

    protected $fillable = ['proc_codigo','proc_descricao'];
}
