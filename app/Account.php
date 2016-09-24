<?php

namespace App;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use BelongsToUser;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
}
