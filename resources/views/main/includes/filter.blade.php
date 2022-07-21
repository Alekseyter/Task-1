<h2 class="fs-4 fw-bold mb-3">{{ __('Фильтр') }}</h2>
<form action="{{ route('main.filter') }}" method="GET">
    <div class="row row-cols-1 g-3">

        <div class="col">
            <label class="mb-1">{{ __('Поиск по названию') }}</label>
            <input type="text" name="name" class="form-control">
        </div>

        <div class="col">
            <label class="mb-1">{{ __('Норма Азот') }}</label>
            <div class="d-flex align-items-center gap-1">
                <input type="number" step="any" name="nitrogen[]" class="form-control" placeholder="{{ __('от ') . $fertilizersAll->min('nitrogen') }}" min="{{ $fertilizersAll->min('nitrogen') }}">
                <input type="number" step="any" name="nitrogen[]" class="form-control" placeholder="{{ __('до ') . $fertilizersAll->max('nitrogen') }}" max="{{ $fertilizersAll->max('nitrogen') }}">
            </div>
        </div>

        <div class="col">
            <label class="mb-1">{{ __('Норма Фосфор') }}</label>
            <div class="d-flex align-items-center gap-1">
                <input type="number" step="any" name="phosphorus[]" class="form-control" placeholder="{{ __('от ') . $fertilizersAll->min('phosphorus') }}" min="{{ $fertilizersAll->min('phosphorus') }}">
                <input type="number" step="any" name="phosphorus[]" class="form-control" placeholder="{{ __('до ') . $fertilizersAll->max('phosphorus') }}" max="{{ $fertilizersAll->max('phosphorus') }}">
            </div>
        </div>

        <div class="col">
            <label class="mb-1">{{ __('Норма Калий') }}</label>
            <div class="d-flex align-items-center gap-1">
                <input type="number" step="any" name="potassium[]" class="form-control" placeholder="{{ __('от ') . $fertilizersAll->min('potassium') }}" min="{{ $fertilizersAll->min('potassium') }}">
                <input type="number" step="any" name="potassium[]" class="form-control" placeholder="{{ __('до ') . $fertilizersAll->max('potassium') }}" max="{{ $fertilizersAll->max('potassium') }}">
            </div>
        </div>

        <div class="col">
            <div class="d-flex gap-1">
                <div class="col-md-6 dropdown dropdown-filter">
                    <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="dropdownMenuCulture" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Группа культур') }}</button>
                    <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuCulture">
                        @foreach($fertilizersAll as $key => $fertilizer)
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="culture_id[]" id="fertilizer-culture-{{ $key }}" value="{{ $fertilizer->culture_id }}">
                                    <label class="form-check-label" for="fertilizer-culture-{{ $key }}">{{ $fertilizer->culture->name }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-6 dropdown dropdown-filter">
                    <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="dropdownMenuDistrict" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Район') }}</button>
                    <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuDistrict">
                        @foreach($fertilizersAll as $key => $fertilizer)
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="district[]" id="fertilizer-district-{{ $key }}" value="{{ $fertilizer->district }}">
                                    <label class="form-check-label" for="fertilizer-district-{{ $key }}">{{ $fertilizer->district }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

        </div>

        <div class="col">
            <label class="mb-1">{{ __('Стоимость') }}</label>
            <div class="d-flex align-items-center gap-1">
                <input type="number" step="any" name="price[]" class="form-control" placeholder="{{ __('от ') . $fertilizersAll->min('price') }}" min="{{ $fertilizersAll->min('price') }}">
                <input type="number" step="any" name="price[]" class="form-control" placeholder="{{ __('до ') . $fertilizersAll->max('price') }}" max="{{ $fertilizersAll->max('price') }}">
            </div>
        </div>

        <div class="col">
            <label class="mb-1">{{ __('Поиск по описанию') }}</label>
            <input type="text" name="description" class="form-control">
        </div>

        <div class="col">
            <label class="mb-1">{{ __('Поиск по назначению') }}</label>
            <input type="text" name="target" class="form-control">
        </div>

        <div class="col">
            <input type="submit" class="btn btn-primary" value="{{ __('Применить') }}">
            <a href="{{ route('main.index') }}" class="btn btn-light">{{ __('Сбросить фильтр') }}</a>
        </div>

    </div>
</form>
