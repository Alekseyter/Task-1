@extends('admin.layouts.base')

@section('content')
    <div class="row row-cols-md-2 row-cols-1 g-5">
        <div class="col">
            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                <h3 class="mb-3">{{ __('Добавить пользователя') }}</h3>

                <input type="text" name="name" class="form-control w-100" value="{{ old('name') }}" placeholder="{{ __('Введите имя пользователя') }}">
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="email" name="email" class="form-control w-100 mt-2" value="{{ old('email') }}" placeholder="{{ __('Введите Ваш e-mail') }}">
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

                <input type="submit" class="btn btn-primary form-control w-100 mt-2" value="{{ __('Добавить') }}">
            </form>
        </div>
        <div class="col">
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Пользователь') }}</th>
                    <th scope="col">{{ __('Действие') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $key => $user)
                    <tr>
                        <th scope="row">
                            {{ ($users->perPage() * ($users->currentPage() - 1)) + ($key + 1) }}
                        </th>
                        <td>{{ $user->name }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('admin.user.edit', $user->id) }}" class="btn btn-success mr-3">{{ __('Изменить') }}</a>
                                <form action="{{ route('admin.user.delete', $user->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">{{ __('Удалить') }}</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-between align-items-start">
                <div>{{ $users->links() }}</div>
                <a href="{{ route('admin.user.trash') }}" class="btn btn-dark">{{ __('Корзина') }}</a>
            </div>
        </div>
    </div>
@endsection
