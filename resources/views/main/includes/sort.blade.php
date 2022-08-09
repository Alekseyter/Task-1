<div class="d-flex mb-2">
    <p class="me-2">{{ __('Сортировать по:') }}</p>
    <a href="{{ route('main.filter.sortName') }}" class="text-decoration-none me-3">{{ __('Название') }}</a>
    <a href="{{ route('main.filter.sortPriceDown') }}" class="text-decoration-none me-3">{{ __('Цена ↓') }}</a>
    <a href="{{ route('main.filter.sortPriceUp') }}" class="text-decoration-none">{{ __('Цена ↑') }}</a>
</div>
