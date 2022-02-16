<?php

/**
*
* @version 1.0
*
* @author Milan Gotera <milangotera@gmail.com>
* @copyright milangotera@gmail.com
*
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'lumen_employees.employees';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'position',
        'age',
        'date',
    ];

}
