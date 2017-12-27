<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyParse extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'company_parses';

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
    protected $fillable = ['name', 'bank', 'birthday', 'business_content', 'ceo', 'company_size', 'corporate_position', 'corporate_type', 'empire_code', 'employee_no', 'eng_name', 'fax', 'industry', 'market_code', 'address', 'phone', 'share_type', 'tax_period', 'tse_code', 'url'];

    
}
