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
                    <th scope="col">{{ __('Дата завершения') }}</th>
                    <th scope="col" class="text-center">{{ __('Действие') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($importStatuses as $key => $importStatus)
                    <tr>
                        <th scope="row">
                            {{ ($importStatuses->perPage() * ($importStatuses->currentPage() - 1)) + ($key + 1) }}
                        </th>
                        <td>
                            @foreach ($statuses as $id => $status)
                                @if ($id === $importStatus->status)
                                    {{ $status }}
                                @endif
                            @endforeach
                        </td>
                        <td>{{ $importStatus->user->name }}</td>
                        <td>{{ $importStatus->created_at }}</td>
                        <td>{{ $importStatus->updated_at }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
{{--                                <a href="{{ route('admin.culture.edit', $culture->id) }}" class="btn btn-success mr-3">{{ __('Изменить') }}</a>--}}
                                <form action="{{ route('admin.import-status.delete', $importStatus->id) }}" method="POST">
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
                <div></div>
                <div>{{ $importStatuses->links() }}</div>
                <a href="{{ route('admin.import-status.deleteAll') }}" class="btn btn-dark mb-3 text-end">{{ __('Удалить все') }}</a>
                {{--                <a href="{{ route('admin.culture.trash') }}" class="btn btn-dark">{{ __('Корзина') }}</a>--}}
            </div>
        </div>
    </div>
@endsection
