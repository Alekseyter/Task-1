@extends('main.layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center pt-4">
                <h2 class="fw-bold mb-4">{{ $fertilizer->name }}</h2>
                <p><span class="fw-bold">{{ __('Норма Азот: ') }}</span>{{ $fertilizer->nitrogen }}</p>
                <p><span class="fw-bold">{{ __('Норма Фосфор: ') }}</span>{{ $fertilizer->phosphorus }}</p>
                <p><span class="fw-bold">{{ __('Норма Калий: ') }}</span>{{ $fertilizer->potassium }}</p>
                <p><span class="fw-bold">{{ __('Группа культур: ') }}</span>{{ $fertilizer->culture->name }}</p>
                <p><span class="fw-bold">{{ __('Район: ') }}</span>{{ $fertilizer->district }}</p>
                <p><span class="fw-bold">{{ __('Стоимость: ') }}</span>{{ $fertilizer->price . __(' руб') }}</p>
                <p><span class="fw-bold">{{ __('Описание: ') }}</span>{{ $fertilizer->description }}</p>
                <p><span class="fw-bold">{{ __('Назначение: ') }}</span>{{ $fertilizer->target }}</p>
                <a href="{{ AppHelper::previousPage('main.index') }}" class="btn btn-light">Назад</a>
            </div>
        </div>
    </div>
</div>
@endsection
