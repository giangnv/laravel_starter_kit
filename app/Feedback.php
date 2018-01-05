<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{

    const CREATED_AT = 'create_time';

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'mysql_feedback';

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'feedback';

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
    protected $fillable = ['email', 'fb', 'status', 'create_time', 'note'];

    public static function getListStatus()
    {
        return [
            'Not yet process',
            'Completed',
            'Not completed'
        ];
    }
}
