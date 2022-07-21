@extends('admin.layouts.base')

@section('content')
    <div class="row row-cols-md-2 row-cols-1 g-5">
        <div class="col">
            <form action="{{ route('admin.fertilizer.update', $fertilizer->id) }}" method="POST">
                @csrf
                @method('PATCH')

                <h3 class="mb-3">{{ __('Изменить Удобрение') }}</h3>

                <label>{{ __('Название удобрения') }}</label>
                <input type="text" name="name" value="{{ $fertilizer->name }}" class="form-control w-100">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <label class="mt-2">{{ __('Норма Азот') }}</label>
                <input type="number" step="any" name="nitrogen" value="{{ $fertilizer->nitrogen }}" class="form-control w-100">
                @error('nitrogen')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <label class="mt-2">{{ __('Норма Фосфор') }}</label>
                <input type="number" step="any" name="phosphorus" value="{{ $fertilizer->phosphorus }}" class="form-control w-100">
                @error('phosphorus')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <label class="mt-2">{{ __('Норма Калий') }}</label>
                <input type="number" step="any" name="potassium" value="{{ $fertilizer->potassium }}" class="form-control w-100">
                @error('potassium')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <label class="mt-2">{{ __('Район') }}</label>
                <input type="text" name="district" value="{{ $fertilizer->district }}" class="form-control w-100">
                @error('district')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <label class="mt-2">{{ __('Стоимость') }}</label>
                <input type="number" step="any" name="price" value="{{ $fertilizer->price }}" class="form-control w-100">
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <label class="mt-2">{{ __('Описание') }}</label>
                <input type="text" name="description" value="{{ $fertilizer->description }}" class="form-control w-100">
                @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <label class="mt-2">{{ __('Назначение') }}</label>
                <input type="text" name="target" value="{{ $fertilizer->target }}" class="form-control w-100">
                @error('target')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <label class="mt-2">{{ __('Группа культур') }}</label>
                <select name="culture_id" class="form-control mb-4">
                    @foreach ($cultures as $culture)
                        <option value="{{ $culture->id }}" {{ $culture->id == $fertilizer->culture_id ? 'selected' : '' }}>
                            {{ $culture->name }}
                        </option>
                    @endforeach
                </select>

                <input type="submit" class="form-control w-100 my-2" value="{{ __('Изменить') }}">
                <a href="{{ AppHelper::previousPage('admin.fertilizer.index') }}" class="btn btn-primary w-100">{{ __('Назад') }}</a>
            </form>
        </div>
    </div>
@endsection
