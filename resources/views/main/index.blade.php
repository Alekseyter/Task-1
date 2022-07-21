@extends('main.layouts.base')

@section('content')
<div class="container">
    <h1 class="fw-bold text-center mb-4">{{ __('Удобрения') }}</h1>
    <div class="row">
        <div class="col-lg-3">
            @include('main.includes.filter')
        </div>
        <div class="col-lg-9">
            @include('main.includes.sort')

            @if($fertilizers->isEmpty())
                <h4 class="text-center">{{ __('Ничего не найдено') }}</h4>
            @endif

            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-1 g-4">
                @foreach($fertilizers as $fertilizer)
                    <div class="col">
                        <div class="d-flex flex-column justify-content-between text-center p-5 rounded shadow">
                            <h2 class="fw-bold mb-4">{{ $fertilizer->name }}</h2>
                            <p>{{ __('Норма Азот: ') . $fertilizer->nitrogen }}</p>
                            <p>{{ __('Норма Фосфор: ') . $fertilizer->phosphorus }}</p>
                            <p>{{ __('Норма Калий: ') . $fertilizer->potassium }}</p>
                            <p>{{ __('Группа культур: ') . $fertilizer->culture->name }}</p>
                            <p>{{ __('Район: ') . $fertilizer->district }}</p>
                            <p>{{ __('Стоимость: ') . $fertilizer->price . __(' руб') }}</p>
                            <p>{{ __('Описание: ') . $fertilizer->description }}</p>
                            <p>{{ __('Назначение: ') . $fertilizer->target }}</p>
                            <a href="{{ route('main.fertilizer.show', $fertilizer->id) }}" class="btn btn-success">{{ __('Подробнее') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center mt-5">
                {{ $fertilizers->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
