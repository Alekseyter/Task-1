@extends('admin.layouts.base')

@section('content')
    <h2 class="fw-bold">{{ $client->name }}</h2>
    <p>{{ __('Стоимость доставки: ') . $client->price . __(' руб')}}</p>
    <p>{{ __('Регион доствки: ') . $client->region }}</p>
    <p>{{ __('Дата договора: ') . $client->date }}</p>
    <a href="{{ AppHelper::previousPage('admin.client.index') }}" class="btn btn-light">Назад</a>
@endsection
