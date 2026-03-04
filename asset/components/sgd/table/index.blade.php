@props(['id' => '', 'headers' => [], 'columns' => []])
<table
    id="{{ $id }}"
    {{ $attributes->merge(['class' => 'w-full']) }}
>
    @if (isset($headers) && count($headers) > 0)
        <x-sgd.table.thead :headers="$headers" />
    @elseif (isset($thead))
        {{ $thead }}
    @endif
    <tbody class="tbody">
        @if (isset($slot))
            {{ $slot }}
        @endif
        {{-- <x-sgd.table.tr :row="$row" :columns="$columns">
            @isset($actions)
                {{ $actions }}
            @endisset
        </x-sgd.table.tr> --}}
    </tbody>
</table>
