@extends('admin.layouts.base')

@section('content')
    <div class="row row-cols-md-2 row-cols-1 g-5">
        <div class="col">
            <form action="{{ route('admin.client.update', $client->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <h3 class="mb-3">{{ __('Изменить данные клиента') }}</h3>

                <label>{{ __('Имя') }}</label>
                <input type="text" name="name" value="{{ $client->name }}" class="form-control w-100">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <label class="mt-2">{{ __('Стоимость доставки') }}</label>
                <input type="number" step="any" name="price" value="{{ $client->price }}" class="form-control w-100">
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <label class="mt-2">{{ __('Регион') }}</label>
                <input type="text" name="region" value="{{ $client->region }}" class="form-control w-100">
                @error('region')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <label class="mt-2">{{ __('Дата договора') }}</label>
                <input type="date" name="date" value="{{ $client->date }}" class="form-control w-100">
                @error('date')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="submit" class="form-control w-100 my-2" value="{{ __('Изменить') }}">
                <a href="{{ AppHelper::previousPage('admin.client.index') }}" class="btn btn-primary w-100">{{ __('Назад') }}</a>
            </form>
        </div>
    </div>
@endsection
