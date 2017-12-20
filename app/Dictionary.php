<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dictionary extends Model
{
    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql_dictionary';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'dictionaries';

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
    protected $fillable = ['app_id', 'surface', 'value', 'cat_name', 'value_type', 'type'];

    
}
