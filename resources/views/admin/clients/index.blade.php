@extends('admin.layouts.base')

@section('content')
    <div class="row g-3">
        <div class="col-lg-3">
            @include('admin.includes.clients-filter')
        </div>
        <div class="col-lg-9">
            @if(session()->has('message'))
                <div class="alert alert-info py-2 text-center">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="d-flex justify-content-between align-items-center">
                @include('admin.includes.clients-sort')
                <div class="d-flex">
                    <form action="{{ route('admin.client.import') }}" method="POST" enctype="multipart/form-data" class="mb-3 pr-2 mr-2 border-right">
                        @csrf
                        <input type="file" name="clients" required>
                        <input type="submit" value="{{ __('Импорт') }}" class="btn btn-success">
                    </form>
                    <a href="{{ route('admin.client.export') }}" class="d-block btn btn-success" style="height: fit-content;">{{ __('Экспорт') }}</a>
                </div>
            </div>
            @if($clients->isEmpty())
                <h4 class="text-center">{{ __('Ничего не найдено') }}</h4>
                <div class="d-flex justify-content-end align-items-start">
                    <a href="{{ route('admin.client.create') }}" class="btn btn-primary mr-2">{{ __('Добавить клиента') }}</a>
                    <a href="{{ route('admin.client.trash') }}" class="btn btn-dark">{{ __('Корзина') }}</a>
                </div>
            @else
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Клиент') }}</th>
                    <th scope="col">{{ __('Стоимость доставки') }}</th>
                    <th scope="col">{{ __('Регион доствки') }}</th>
                    <th scope="col">{{ __('Дата договора') }}</th>
                    <th scope="col" class="text-center">{{ __('Действие') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $key => $client)
                    <tr>
                        <th scope="row">
                            {{ ($clients->perPage() * ($clients->currentPage() - 1)) + ($key + 1) }}
                        </th>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->price . __(' руб')}}</td>
                        <td>{{ $client->region }}</td>
                        <td>{{ $client->date }}</td>
                        <td>
                            <div class="d-flex justify-content-center align-items-center">
{{--                                <a href="{{ route('admin.client.show', $client->id) }}" class="btn btn-success mr-3">{{ __('Посмотреть') }}</a>--}}
                                <a href="{{ route('admin.client.edit', $client->id) }}" class="btn btn-primary mr-3">{{ __('Изменить') }}</a>
                                <form action="{{ route('admin.client.delete', $client->id) }}" method="POST" class="mr-3">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">{{ __('Удалить') }}</button>
                                </form>
                                <a href="{{ route('admin.client.word.export', $client->id) }}" class="btn btn-light">{{ __('Скачать договор') }}</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-between align-items-start">
                <a href="{{ route('admin.client.create') }}" class="btn btn-primary">{{ __('Добавить клиента') }}</a>
                <div>{{ $clients->withQueryString()->onEachSide(1)->links() }}</div>
                <a href="{{ route('admin.client.trash') }}" class="btn btn-dark">{{ __('Корзина') }}</a>
            </div>
            @endif
        </div>
    </div>
@endsection
