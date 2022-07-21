@extends('admin.layouts.base')

@section('content')
    <div class="row row-cols-md-2 row-cols-1 g-5">
        <div class="col">
            <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                @csrf
                @method('PATCH')
                <h3 class="mb-3">{{ __('Изменить данные пользователя') }}</h3>

                <input type="text" name="name" class="form-control w-100" value="{{ $user->name }}" placeholder="{{ __('Введите имя пользователя') }}">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="email" name="email" class="form-control w-100 mt-2" value="{{ $user->email }}" placeholder="{{ __('Введите Ваш e-mail') }}">
                <input type="hidden" name="user_id" value="{{ $user->id }}">
                @error('email')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="password" name="password" class="form-control w-100 mt-2" placeholder="{{ __('Введите пароль') }}">
                @error('password')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="password" name="password_confirmation" class="form-control w-100 mt-2" placeholder="{{ __('Подтвердите пароль') }}">
                @error('password_confirmation')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="submit" class="btn btn-primary form-control w-100 my-2" value="{{ __('Изменить') }}">
                <a href="{{ AppHelper::previousPage('admin.user.index') }}" class="btn btn-primary w-100">{{ __('Назад') }}</a>
            </form>
        </div>
    </div>
@endsection
