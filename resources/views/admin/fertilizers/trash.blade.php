@extends('admin.layouts.base')

@section('content')
    <div class="row row-cols-md-2 row-cols-1 g-5">
        <div class="col">
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Удобрение') }}</th>
{{--                    <th scope="col">{{ __('Действие') }}</th>--}}
                </tr>
                </thead>
                <tbody>
                @foreach($fertilizers as $key => $fertilizer)
                    <tr>
                        <th scope="row">
                            {{ $fertilizer->id }}
                        </th>
                        <td>{{ $fertilizer->name }}</td>
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
                    </tr>
                @endforeach
                </tbody>
            </table>
            <a href="{{ AppHelper::previousPage('admin.fertilizer.index') }}" class="btn btn-dark mt-2">{{ __('Назад') }}</a>
        </div>
    </div>
@endsection
