@php
    $cities = App\Models\City::orderBy('city_sort_num', 'asc')->get();
@endphp

@foreach ($cities as $item)
    <li><a href="/city/{{ $item->city_id }}">{{ $item->city_name }}</a></li>
@endforeach