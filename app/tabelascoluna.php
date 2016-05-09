<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class tabelascoluna extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tabelascolunas';

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
    protected $fillable = ['id_coluna1', 'id_coluna2'];
}
