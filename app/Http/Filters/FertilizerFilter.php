<?php


namespace App\Http\Filters;


use App\Models\Fertilizer;
use Illuminate\Database\Eloquent\Builder;

class FertilizerFilter extends AbstractFilter
{
    public const NAME = 'name';
    public const NITROGEN = 'nitrogen';
    public const PHOSPHORUS = 'phosphorus';
    public const POTASSIUM = 'potassium';
    public const CULTURE_ID = 'culture_id';
    public const DISTRICT = 'district';
    public const PRICE = 'price';
    public const DESCRIPTION = 'description';
    public const TARGET = 'target';

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::NITROGEN => [$this, 'nitrogen'],
            self::PHOSPHORUS => [$this, 'phosphorus'],
            self::POTASSIUM => [$this, 'potassium'],
            self::CULTURE_ID => [$this, 'cultureId'],
            self::DISTRICT => [$this, 'district'],
            self::PRICE => [$this, 'price'],
            self::DESCRIPTION => [$this, 'description'],
            self::TARGET => [$this, 'target'],
        ];
    }

    public function name(Builder $builder, $value)
    {
        $builder->where('name', 'like', "%{$value}%");
    }

    public function nitrogen(Builder $builder, $value)
    {
        if (isset($value[0])) {
            $nitrogenFrom = $value[0];
            if(empty($nitrogenFrom)) $nitrogenFrom = Fertilizer::all()->min('nitrogen');
            $builder->where('nitrogen', '>=', $nitrogenFrom);
        }

        if (isset($value[1])) {
            $nitrogenTo = $value[1];
            if(empty($nitrogenTo)) $nitrogenTo = Fertilizer::all()->max('nitrogen');
            $builder->where('nitrogen', '<=', $nitrogenTo);
        }
    }

    public function phosphorus(Builder $builder, $value)
    {
        if (isset($value[0])) {
            $phosphorusFrom = $value[0];
            if(empty($phosphorusFrom)) $phosphorusFrom = Fertilizer::all()->min('phosphorus');
            $builder->where('phosphorus', '>=', $phosphorusFrom);
        }

        if (isset($value[1])) {
            $phosphorusTo = $value[1];
            if(empty($phosphorusTo)) $phosphorusTo = Fertilizer::all()->max('phosphorus');
            $builder->where('phosphorus', '<=', $phosphorusTo);
        }
    }

    public function potassium(Builder $builder, $value)
    {
        if (isset($value[0])) {
            $potassiumFrom = $value[0];
            if(empty($potassiumFrom)) $potassiumFrom = Fertilizer::all()->min('potassium');
            $builder->where('potassium', '>=', $potassiumFrom);
        }

        if (isset($value[1])) {
            $potassiumTo = $value[1];
            if(empty($potassiumTo)) $potassiumTo = Fertilizer::all()->max('potassium');
            $builder->where('potassium', '<=', $potassiumTo);
        }
    }

    public function cultureId(Builder $builder, $value)
    {
        $builder->whereIn('culture_id', $value);
    }

    public function district(Builder $builder, $value)
    {
        $builder->whereIn('district', $value);
    }

    public function price(Builder $builder, $value)
    {
        if (isset($value[0])) {
            $priceFrom = $value[0];
            if(empty($priceFrom)) $priceFrom = Fertilizer::all()->min('price');
            $builder->where('price', '>=', $priceFrom);
        }

        if (isset($value[1])) {
            $priceTo = $value[1];
            if(empty($priceTo)) $priceTo = Fertilizer::all()->max('price');
            $builder->where('price', '<=', $priceTo);
        }
    }

    public function description(Builder $builder, $value)
    {
        $builder->where('description', 'like', "%{$value}%");
    }

    public function target(Builder $builder, $value)
    {
        $builder->where('target', 'like', "%{$value}%");
    }
}
