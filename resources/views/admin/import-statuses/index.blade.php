@extends('admin.layouts.base')

@section('content')
    <div class="row row-cols-1 g-5">
        <div class="col">
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Статус') }}</th>
                    <th scope="col">{{ __('Ошибки') }}</th>
                    <th scope="col">{{ __('Пользователь') }}</th>
                    <th scope="col">{{ __('Дата создания') }}</th>
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
                                    @switch($importStatus->status)
                                        @case(1) <div class="status-blue">{{ $status }}</div> @break
                                        @case(2) <div class="status-red">{{ $status }}</div> @break
                                        @case(3) <div class="status-green">{{ $status }}</div> @break
                                        @default <div>{{ $status }}</div>
                                    @endswitch
                                @endif
                            @endforeach
                        </td>
                        <td>
                            <div class="errors-block">
                                @php
                                    $importStatusesErrors = json_decode($importStatus->errors);
                                    if(!(empty($importStatusesErrors))) {
                                        $keys = array_column($importStatusesErrors, 'row');
                                        array_multisort($keys, SORT_ASC, $importStatusesErrors);
                                    }
                                @endphp
                                @if(!(empty($importStatusesErrors)))
                                    @foreach($importStatusesErrors as $error)
                                        <div class="errors-block__elem">
                                            {!! 'Колонка: <span>' . $error->row . '</span><br>' !!}
                                            {!! '<span class="errors-block__error">' . $error->errors[0] . '</span>' !!}
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </td>
                        <td>{{ $importStatus->user->name }}</td>
                        <td>{{ $importStatus->created_at }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
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
