<?php


namespace App\Http\Filters;


use App\Models\Client;
use Illuminate\Database\Eloquent\Builder;

class ClientFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const DATE = 'date';
    public const PRICE = 'price';
    public const REGION = 'region';

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::DATE => [$this, 'date'],
            self::PRICE => [$this, 'price'],
            self::REGION => [$this, 'region'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function date(Builder $builder, $value)
    {
        if (isset($value[0])) {
            $dateFrom = $value[0];
            if(empty($dateFrom)) $dateFrom = Client::all()->min('date');
            $builder->where('date', '>=', $dateFrom);
        }

        if (isset($value[1])) {
            $dateTo = $value[1];
            if(empty($dateTo)) $dateTo = Client::all()->max('date');
            $builder->where('date', '<=', $dateTo);
        }
    }

    public function price(Builder $builder, $value)
    {
        if (isset($value[0])) {
            $priceFrom = $value[0];
            if(empty($priceFrom)) $priceFrom = Client::all()->min('price');
            $builder->where('price', '>=', $priceFrom);
        }

        if (isset($value[1])) {
            $priceTo = $value[1];
            if(empty($priceTo)) $priceTo = Client::all()->max('price');
            $builder->where('price', '<=', $priceTo);
        }
    }

    public function region(Builder $builder, $value)
    {
        $builder->whereIn('region', $value);
    }
}
