<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vinculotabela extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'vinculotabelas';

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
    protected $fillable = ['id_tabela1', 'id_tabela2'];
}
