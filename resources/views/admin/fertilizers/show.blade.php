@extends('admin.layouts.base')

@section('content')
    <h2 class="fw-bold">{{ $fertilizer->name }}</h2>
    <p>{{ __('Норма Азот: ') . $fertilizer->nitrogen }}</p>
    <p>{{ __('Норма Фосфор: ') . $fertilizer->phosphorus }}</p>
    <p>{{ __('Норма Калий: ') . $fertilizer->potassium }}</p>
    <p>{{ __('Группа культур: ') . $fertilizer->culture->name }}</p>
    <p>{{ __('Район: ') . $fertilizer->district }}</p>
    <p>{{ __('Стоимость: ') . $fertilizer->price }}</p>
    <p>{{ __('Описание: ') . $fertilizer->description }}</p>
    <p>{{ __('Наименование: ') . $fertilizer->target }}</p>
    <a href="{{ AppHelper::previousPage('admin.fertilizer.index') }}" class="btn btn-light">Назад</a>
@endsection
