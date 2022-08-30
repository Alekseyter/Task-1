<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImportStatus extends Model
{
    use HasFactory;

    protected $table = 'import_statuses';
    protected $guarded = false;

    const STATUS_1 = 1;
    const STATUS_2 = 2;
    const STATUS_3 = 3;

    public static function getStatuses ()
    {
        return [
            self::STATUS_1    => 'В процессе',
            self::STATUS_2   => 'Ошибка во время импорта',
            self::STATUS_3   => 'Данные успешно импортированы',
        ];
    }

    function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
