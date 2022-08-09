<h2 class="fs-4 fw-bold mb-3">{{ __('Фильтр') }}</h2>
<form action="{{ route('admin.client.filter') }}" method="GET">
    <div class="row row-cols-1 g-3">

        <div class="col">
            <label class="mb-1">{{ __('Поиск по имени') }}</label>
            <input type="text" name="name" class="form-control" value="{{ Request::get('name') }}">
        </div>

        <div class="col">
            <label class="mb-1">{{ __('Дата договора') }}</label>
            <div class="d-flex align-items-center gap-2">
                <input type="date" name="date[]" class="form-control" value="{{ Request::get('date')[0] ?? '' }}">
                <input type="date" name="date[]" class="form-control" value="{{ Request::get('date')[1] ?? '' }}">
            </div>
        </div>

        <div class="col">
            <label class="mb-1">{{ __('Стоимость доставки') }}</label>
            <div class="d-flex align-items-center gap-2">
                <input type="number" step="any" name="price[]" class="form-control" placeholder="{{ __('от ') . $clients_all->min('price') }}" min="{{ $clients_all->min('price') }}" value="{{ Request::get('price')[0] ?? '' }}">
                <input type="number" step="any" name="price[]" class="form-control" placeholder="{{ __('до ') . $clients_all->max('price') }}" max="{{ $clients_all->max('price') }}" value="{{ Request::get('price')[1] ?? '' }}">
            </div>
        </div>

        <div class="col my-4">
            <div class="dropdown dropdown-filter">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuRegion" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Регион доставки') }}</button>
                <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuRegion">
                    @foreach($clients_all as $key => $client)
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="region[]" id="fertilizer-region-{{ $key }}" value="{{ $client->region }}" {{ Request::get('region') ? (in_array($client->region, Request::get('region')) ? 'checked' : '' ) : '' }}>
                                <label class="form-check-label" for="fertilizer-region-{{ $key }}">{{ $client->region }}</label>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="col">
            <input type="submit" class="btn btn-primary" value="{{ __('Применить') }}">
            <a href="{{ route('admin.client.index') }}" class="btn btn-dark">{{ __('Сбросить фильтр') }}</a>
        </div>

    </div>
</form>
