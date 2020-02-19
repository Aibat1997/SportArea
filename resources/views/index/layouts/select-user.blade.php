@php
    $users = App\Models\User::all();
@endphp

@foreach ($users as $item)
    <option data-value="{{ $item->user_id }}" value="{{ $item->user_lastname }} {{ $item->user_firstname }}"></option>
@endforeach