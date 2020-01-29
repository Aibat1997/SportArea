@php
    $cities = App\Models\City::orderBy('city_sort_num', 'asc')->get();
@endphp

@foreach ($cities as $item)
    <option value="{{ $item->city_id }}">{{ $item->city_name }}</option>
@endforeach