@php
    $cities = App\Models\City::orderBy('city_sort_num', 'asc')->get();
@endphp

<option label="Выберите город"></option>
@foreach ($cities as $item)
    <option value="{{ $item->city_id }}">{{ $item->city_name }}</option>
@endforeach