<h2 class="fs-4 fw-bold mb-3">{{ __('Фильтр') }}</h2>
<form action="{{ route('admin.client.filter') }}" method="GET">
    <div class="row row-cols-1 g-3">

        <div class="col">
            <label class="mb-1">{{ __('Поиск по имени') }}</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="col">
            <label class="mb-1">{{ __('Дата договора') }}</label>
            <div class="d-flex align-items-center gap-2">
                <input type="date" name="date[]" class="form-control">
                <input type="date" name="date[]" class="form-control">
            </div>
        </div>

        <div class="col">
            <label class="mb-1">{{ __('Стоимость доставки') }}</label>
            <div class="d-flex align-items-center gap-2">
                <input type="number" step="any" name="price[]" class="form-control" placeholder="{{ __('от ') . $clientsAll->min('price') }}" min="{{ $clientsAll->min('price') }}">
                <input type="number" step="any" name="price[]" class="form-control" placeholder="{{ __('до ') . $clientsAll->max('price') }}" max="{{ $clientsAll->max('price') }}">
            </div>
        </div>

        <div class="col my-4">
            <div class="dropdown dropdown-filter">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuRegion" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Регион доставки') }}</button>
                <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuRegion">
                    @foreach($clientsAll as $key => $client)
                        <li>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="region[]" id="fertilizer-region-{{ $key }}" value="{{ $client->region }}">
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
