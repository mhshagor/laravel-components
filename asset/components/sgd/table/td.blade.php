@props(['row', 'column', 'menu' => ''])
@if (isset($row) && isset($column))
    <td {{ $attributes }}>{{ $row->$column ?? 'School' }}</td>
    <td {{ $attributes }}>{{ $slot }}</td>
@else
    <td {{ $attributes->merge(['class' => 'whitespace-nowrap p-1 text-sm']) }}>{{ $slot }}</td>
@endif
