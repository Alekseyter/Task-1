@extends('admin.layouts.base')

@section('content')
    <div class="row row-cols-1 g-5">
        <div class="col">
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Статус') }}</th>
                    <th scope="col">{{ __('Пользователь') }}</th>
                    <th scope="col">{{ __('Дата создания') }}</th>
                    <th scope="col">{{ __('Дата обновления') }}</th>
                </tr>
                </thead>
                <tbody>
{{--                @foreach($cultures as $key => $culture)--}}
{{--                    <tr>--}}
{{--                        <th scope="row">--}}
{{--                            {{ ($cultures->perPage() * ($cultures->currentPage() - 1)) + ($key + 1) }}--}}
{{--                        </th>--}}
{{--                        <td>{{ $culture->name }}</td>--}}
{{--                        <td>--}}
{{--                            <div class="d-flex align-items-center">--}}
{{--                                <a href="{{ route('admin.culture.edit', $culture->id) }}" class="btn btn-success mr-3">{{ __('Изменить') }}</a>--}}
{{--                                <form action="{{ route('admin.culture.delete', $culture->id) }}" method="POST">--}}
{{--                                    @csrf--}}
{{--                                    @method('DELETE')--}}
{{--                                    <button class="btn btn-danger">{{ __('Удалить') }}</button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @endforeach--}}
                </tbody>
            </table>
            <div class="d-flex justify-content-between align-items-start">
{{--                <div>{{ $cultures->links() }}</div>--}}
{{--                <a href="{{ route('admin.culture.trash') }}" class="btn btn-dark">{{ __('Корзина') }}</a>--}}
            </div>
        </div>
    </div>
@endsection
