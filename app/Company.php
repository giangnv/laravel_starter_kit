<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql_company';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'companies';

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
    protected $fillable = ['name', 'phone', 'fax', 'postal', 'address', 'cd_id', 'representative', 'representative_last_name', 'representative_first_name', 'establisted', 'listed_id', 'employees', 'capital'];

    
}
