<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;

    protected $table = 'clients';
    protected $guarded = false;
    /**
     * @var mixed
     */
    private $date;
    private $name;
    private $price;
    private $region;
}
