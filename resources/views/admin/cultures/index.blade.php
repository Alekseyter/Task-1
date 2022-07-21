@extends('admin.layouts.base')

@section('content')
    <div class="row row-cols-md-2 row-cols-1 g-5">
        <div class="col">
            <form action="{{ route('admin.culture.store') }}" method="POST">
                @csrf
                <h3 class="mb-3">{{ __('Добавить группу культур') }}</h3>
                <input type="text" name="name" class="form-control w-100" placeholder="{{ __('Введите название группы культур') }}">
                @error('name')
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
                    <th scope="col">{{ __('Группа культур') }}</th>
                    <th scope="col">{{ __('Действие') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($cultures as $key => $culture)
                    <tr>
                        <th scope="row">
                            {{ ($cultures->perPage() * ($cultures->currentPage() - 1)) + ($key + 1) }}
                        </th>
                        <td>{{ $culture->name }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('admin.culture.edit', $culture->id) }}" class="btn btn-success mr-3">{{ __('Изменить') }}</a>
                                <form action="{{ route('admin.culture.delete', $culture->id) }}" method="POST">
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
                <div>{{ $cultures->links() }}</div>
                <a href="{{ route('admin.culture.trash') }}" class="btn btn-dark">{{ __('Корзина') }}</a>
            </div>
        </div>
    </div>
@endsection
