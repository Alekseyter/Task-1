@extends('admin.layouts.base')

@section('content')
    <div class="row row-cols-md-2 row-cols-1 g-5">
        <div class="col">
            <form action="{{ route('admin.fertilizer.store') }}" method="POST">
                @csrf

                <h3 class="mb-3">{{ __('Добавить Удобрение') }}</h3>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control w-100" placeholder="{{ __('Введите название удобрения') }}">
                @error('name')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="number" step="any" name="nitrogen" value="{{ old('nitrogen') }}" class="form-control w-100 mt-2" placeholder="{{ __('Норма Азот') }}">
                @error('nitrogen')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="number" step="any" name="phosphorus" value="{{ old('phosphorus') }}" class="form-control w-100 mt-2" placeholder="{{ __('Норма Фосфор') }}">
                @error('phosphorus')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="number" step="any" name="potassium" value="{{ old('potassium') }}" class="form-control w-100 mt-2" placeholder="{{ __('Норма Калий') }}">
                @error('potassium')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="text" name="district" value="{{ old('district') }}" class="form-control w-100 mt-2" placeholder="{{ __('Район') }}">
                @error('district')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="number" step="any" name="price" value="{{ old('price') }}" class="form-control w-100 mt-2" placeholder="{{ __('Стоимость') }}">
                @error('price')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="text" name="description" value="{{ old('description') }}" class="form-control w-100 mt-2" placeholder="{{ __('Описание') }}">
                @error('description')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <input type="text" name="target" value="{{ old('target') }}" class="form-control w-100 mt-2" placeholder="{{ __('Назначение') }}">
                @error('target')
                <div class="text-danger">{{ $message }}</div>
                @enderror

                <label class="mt-2">{{ __('Группа культур') }}</label>
                <select name="culture_id" class="form-control mb-4">
                    @foreach ($cultures as $culture)
                        <option value="{{ $culture->id }}" {{ $culture->id == old('culture_id') ? 'selected' : '' }}>
                            {{ $culture->name }}
                        </option>
                    @endforeach
                </select>

                <input type="submit" class="btn btn-primary form-control w-100 mt-2" value="{{ __('Добавить') }}">
            </form>
        </div>
        <div class="col">
            @if(session()->has('message'))
                <div class="alert alert-info py-2 text-center">
                    {{ session()->get('message') }}
                </div>
            @endif
            <div class="d-flex justify-content-end">
                <form action="{{ route('admin.fertilizer.import') }}" method="POST" enctype="multipart/form-data" class="mb-3 pr-2 mr-2 border-right">
                    @csrf
                    <input type="file" name="fertilizers" required>
                    <input type="submit" value="{{ __('Импорт') }}" class="btn btn-success">
                </form>
                <a href="{{ route('admin.fertilizer.export') }}" class="d-block btn btn-success" style="height: fit-content;">{{ __('Экспорт') }}</a>
            </div>
            <table class="table table-dark table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">{{ __('Удобрение') }}</th>
                    <th scope="col">{{ __('Действие') }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($fertilizers as $key => $fertilizer)
                    <tr>
                        <th scope="row">
                            {{ ($fertilizers->perPage() * ($fertilizers->currentPage() - 1)) + ($key + 1) }}
                        </th>
                        <td>{{ $fertilizer->name }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <a href="{{ route('admin.fertilizer.show', $fertilizer->id) }}" class="btn btn-success mr-3">{{ __('Посмотреть') }}</a>
                                <a href="{{ route('admin.fertilizer.edit', $fertilizer->id) }}" class="btn btn-primary mr-3">{{ __('Изменить') }}</a>
                                <form action="{{ route('admin.fertilizer.delete', $fertilizer->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">{{ __('Удалить') }}</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="d-flex justify-content-between align-items-start">
                <div>{{ $fertilizers->onEachSide(1)->links() }}</div>
                <a href="{{ route('admin.fertilizer.trash') }}" class="btn btn-dark">{{ __('Корзина') }}</a>
            </div>
        </div>
    </div>
@endsection
