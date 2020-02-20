@php
    $coverages = App\Models\TypeCoverage::orderBy('tc_sort_num', 'asc')->get();
@endphp

<option label="Тип покрытия"></option>
@foreach ($coverages as $item)
    <option value="{{ $item->tc_id }}">{{ $item->tc_name }}</option>
@endforeach