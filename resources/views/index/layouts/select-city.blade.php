@php
    $cities = App\Models\City::orderBy('city_sort_num', 'asc')->get();
@endphp

<option label="Выберите город"></option>
@foreach ($cities as $item)
    @if (request()->city != null)
        <option value="{{ $item->city_id }}" {{ request()->city == $item->city_id ? 'selected' : '' }}>{{ $item->city_name }}</option>
    @else
        <option value="{{ $item->city_id }}">{{ $item->city_name }}</option>
    @endif
@endforeach