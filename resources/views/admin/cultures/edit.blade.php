@extends('admin.layouts.base')

@section('content')
    <div class="row row-cols-md-2 row-cols-1 g-5">
        <div class="col">
            <form action="{{ route('admin.culture.update', $culture->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <h3 class="mb-3">{{ __('Изменить группу культур') }}</h3>
                <input type="text" name="name" class="form-control w-100" value="{{ $culture->name }}" placeholder="{{ __('Введите название группы культур') }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="submit" class="btn btn-primary form-control w-100 my-2" value="{{ __('Изменить') }}">
                <a href="{{ AppHelper::previousPage('admin.culture.index') }}" class="btn btn-primary w-100">{{ __('Назад') }}</a>
            </form>
        </div>
    </div>
@endsection
