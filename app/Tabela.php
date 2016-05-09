<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tabela extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tabelas';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_configuracao', 'id_parametro', 'nome'];
}
