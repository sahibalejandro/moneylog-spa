<?php

namespace App;

use App\Traits\BelongsToUser;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use BelongsToUser;
}
