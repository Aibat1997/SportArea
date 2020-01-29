@php
    $sport_type = App\Models\SportTypes::orderBy('st_sort_num', 'asc')->get();
@endphp

@foreach ($sport_type as $item)
    <option value="{{ $item->st_id }}">{{ $item->st_name }}</option>
@endforeach