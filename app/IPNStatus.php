<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IPNStatus extends Model
{
    /**
     * @access protected 
     * @var string $table
     */
    protected $table = 'ipn_status';

    /**
     * @access protected 
     * @var array $fillable
     */
    protected $fillable = [
        'payload',
        'status'
    ];
}
