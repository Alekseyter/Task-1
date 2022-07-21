@extends('admin.layouts.base')

@section('content')
    <div class="row align-items-center justify-content-evenly">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h4>{{ __('Группы культур') }}</h4>
                </div>
                <a href="{{ route('admin.culture.index') }}" class="small-box-footer">{{ __('Перейти') }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h4>{{ __('Удобрения') }}</h4>
                </div>
                <a href="{{ route('admin.fertilizer.index') }}" class="small-box-footer">{{ __('Перейти') }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h4>{{ __('Клиенты') }}</h4>
                </div>
                <a href="{{ route('admin.client.index') }}" class="small-box-footer">{{ __('Перейти') }} <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
