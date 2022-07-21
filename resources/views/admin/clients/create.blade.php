@extends('admin.layouts.base')

@section('content')
    <div class="row row-cols-md-2 row-cols-1 g-5">
        <div class="col">
            <form action="{{ route('admin.client.store') }}" method="POST">
                @csrf

                <h3 class="mb-3">{{ __('Новый клиент') }}</h3>

                <input type="text" name="name" value="{{ old('name') }}" class="form-control w-100" placeholder="{{ __('Введите имя') }}">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="number" step="any" name="price" value="{{ old('price') }}" class="form-control w-100 mt-2" placeholder="{{ __('Стоимость доставки') }}">
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="text" name="region" value="{{ old('region') }}" class="form-control w-100 mt-2" placeholder="{{ __('Регион') }}">
                @error('region')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <label class="mt-2">{{ __('Дата договора') }}</label>
                <input type="date" name="date" value="{{ old('date') }}" class="form-control w-100">
                @error('date')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="submit" class="btn btn-primary form-control w-100 my-2" value="{{ __('Добавить') }}">
                <a href="{{ AppHelper::previousPage('admin.client.index') }}" class="btn btn-primary w-100">{{ __('Назад') }}</a>
            </form>
        </div>
    </div>
@endsection
