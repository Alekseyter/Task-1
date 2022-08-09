<h2 class="fs-4 fw-bold mb-3">{{ __('Фильтр') }}</h2>
<form action="{{ route('main.filter') }}" method="GET">
    <div class="row row-cols-1 g-3">

        <div class="col">
            <label class="mb-1">{{ __('Поиск по названию') }}</label>
            <input type="text" name="name" class="form-control" value="{{ Request::get('name') }}">
        </div>

        <div class="col">
            <label class="mb-1">{{ __('Норма Азот') }}</label>
            <div class="d-flex align-items-center gap-1">
                <input type="number" step="any" name="nitrogen[]" class="form-control" placeholder="{{ __('от ') . $fertilizers_all->min('nitrogen') }}" min="{{ $fertilizers_all->min('nitrogen') }}" value="{{ Request::get('nitrogen')[0] ?? '' }}">
                <input type="number" step="any" name="nitrogen[]" class="form-control" placeholder="{{ __('до ') . $fertilizers_all->max('nitrogen') }}" max="{{ $fertilizers_all->max('nitrogen') }}" value="{{ Request::get('nitrogen')[1] ?? '' }}">
            </div>
        </div>

        <div class="col">
            <label class="mb-1">{{ __('Норма Фосфор') }}</label>
            <div class="d-flex align-items-center gap-1">
                <input type="number" step="any" name="phosphorus[]" class="form-control" placeholder="{{ __('от ') . $fertilizers_all->min('phosphorus') }}" min="{{ $fertilizers_all->min('phosphorus') }}" value="{{ Request::get('phosphorus')[0] ?? '' }}">
                <input type="number" step="any" name="phosphorus[]" class="form-control" placeholder="{{ __('до ') . $fertilizers_all->max('phosphorus') }}" max="{{ $fertilizers_all->max('phosphorus') }}" value="{{ Request::get('phosphorus')[1] ?? '' }}">
            </div>
        </div>

        <div class="col">
            <label class="mb-1">{{ __('Норма Калий') }}</label>
            <div class="d-flex align-items-center gap-1">
                <input type="number" step="any" name="potassium[]" class="form-control" placeholder="{{ __('от ') . $fertilizers_all->min('potassium') }}" min="{{ $fertilizers_all->min('potassium') }}" value="{{ Request::get('potassium')[0] ?? '' }}">
                <input type="number" step="any" name="potassium[]" class="form-control" placeholder="{{ __('до ') . $fertilizers_all->max('potassium') }}" max="{{ $fertilizers_all->max('potassium') }}" value="{{ Request::get('potassium')[1] ?? '' }}">
            </div>
        </div>

        <div class="col">
            <div class="d-flex gap-1">
                <div class="col-md-6 dropdown dropdown-filter">
                    <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="dropdownMenuCulture" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Группа культур') }}</button>
                    <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuCulture">
                        @foreach($fertilizers_culture as $key => $fertilizer)
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="culture_id[]" id="fertilizer-culture-{{ $key }}" value="{{ $fertilizer->culture_id }}" {{ Request::get('culture_id') ? (in_array($fertilizer->culture_id, Request::get('culture_id')) ? 'checked' : '') : ''}}>
                                    <label class="form-check-label" for="fertilizer-culture-{{ $key }}">{{ $fertilizer->culture->name }}</label>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>

                <div class="col-md-6 dropdown dropdown-filter">
                    <button class="btn btn-secondary dropdown-toggle w-100" type="button" id="dropdownMenuDistrict" data-bs-toggle="dropdown" aria-expanded="false">{{ __('Район') }}</button>
                    <ul class="dropdown-menu p-3" aria-labelledby="dropdownMenuDistrict">
                        @foreach($fertilizers_district as $key => $fertilizer)
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="district[]" id="fertilizer-district-{{ $key }}" value="{{ $fertilizer->district }}" {{ Request::get('district') ? (in_array($fertilizer->district, Request::get('district')) ? 'checked' : '') : ''}}>
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
                <input type="number" step="any" name="price[]" class="form-control" placeholder="{{ __('от ') . $fertilizers_all->min('price') }}" min="{{ $fertilizers_all->min('price') }}" value="{{ Request::get('price')[0] ?? '' }}">
                <input type="number" step="any" name="price[]" class="form-control" placeholder="{{ __('до ') . $fertilizers_all->max('price') }}" max="{{ $fertilizers_all->max('price') }}" value="{{ Request::get('price')[1] ?? '' }}">
            </div>
        </div>

        <div class="col">
            <label class="mb-1">{{ __('Поиск по описанию') }}</label>
            <input type="text" name="description" class="form-control" value="{{ Request::get('description') }}">
        </div>

        <div class="col">
            <label class="mb-1">{{ __('Поиск по назначению') }}</label>
            <input type="text" name="target" class="form-control" value="{{ Request::get('target') }}">
        </div>

        <div class="col">
            <input type="submit" class="btn btn-primary" value="{{ __('Применить') }}">
            <a href="{{ route('main.index') }}" class="btn btn-light">{{ __('Сбросить фильтр') }}</a>
        </div>

    </div>
</form>
