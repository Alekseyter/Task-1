<div class="d-flex mb-2 client-sort">
    <p class="me-2" style="color: #999;">{{ __('Сортировать по:') }}</p>
    <a href="{{ route('admin.client.filter.sortName') }}" class="text-decoration-none me-3">{{ __('Имени') }}</a>
    <a href="{{ route('admin.client.filter.sortPriceDown') }}" class="text-decoration-none me-3">{{ __('Стоимость ↓') }}</a>
    <a href="{{ route('admin.client.filter.sortPriceUp') }}" class="text-decoration-none">{{ __('Стоимость ↑') }}</a>
</div>
