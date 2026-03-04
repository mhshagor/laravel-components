@props(['row', 'columns' => [], 'td_class' => '', 'menu' => ''])
<tr id="{{ $menu }}_row_{{ $row->id }}" {{ $attributes }}>
    @foreach ($columns as $column)
        <x-sgd.table.td :row="$row" :column="$column" :class="$td_class">
            {{ $slot }}
        </x-sgd.table.td>
    @endforeach
    {{-- @foreach ($config['columns'] as $column)
        <x-sgd.table.td :row="$row" :column="$column" :class="$td_class" />
    @endforeach
    <x-sgd.table.td :class="$td_class">
        @if ($row->school_id !== null)
            <form action="{{ route('classGroups.status', $row->id) }}" method="POST" class="inline">
                @csrf
                @method('PUT')
                <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Status</button>
            </form>
            <a href="{{ route('classGroups.edit', $row->id) }}" class="text-blue-600 hover:text-blue-900">Edit</a>
            <form action="{{ route('classGroups.destroy', $row->id) }}" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
            </form>
            <button type="button" class="universal_edit_btn" data-id="{{ $row->id }}" data-namespace="groups"
                data-modal="editGroupModal" data-url="{{ route('classGroups.update', $row->id) }}">
                Edit New
            </button>
        @endif
    </x-sgd.table.td> --}}
</tr>
