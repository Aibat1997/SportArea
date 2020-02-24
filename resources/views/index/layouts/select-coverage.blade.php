@php
    $coverages = App\Models\TypeCoverage::orderBy('tc_sort_num', 'asc')->get();
@endphp

<option label="Тип покрытия"></option>
@foreach ($coverages as $item)
    @if (request()->coverage != null)
        <option value="{{ $item->tc_id }}" {{ request()->coverage == $item->tc_id ? 'selected' : '' }}>{{ $item->tc_name }}</option>
    @else
        <option value="{{ $item->tc_id }}">{{ $item->tc_name }}</option>
    @endif
@endforeach