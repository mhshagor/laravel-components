@props(['th' => [], 'id' => ''])
@php
    $theadTh = 'whitespace-nowrap font-medium text-sm border-b dark:border-black/30 border-gray-300 text-center';
@endphp
<table
    class="w-full dynamicTable border border-gray-300 dark:border-black/30"
    id="{{ $id }}"
>
    <thead class="bg-black/30">
        <tr>
            <th
                class="{{ $theadTh }}"
                width="2%"
            >
                #
            </th>
            @foreach ($th as $header)
                <th class="{{ $theadTh }}">
                    {{ Str::headline($header) }}
                </th>
            @endforeach
            <th
                class="{{ $theadTh }}"
                width="0.5%"
            >
                <button
                    class="addRow bg-indigo-600 dark:bg-indigo-500 hover:bg-indigo-500 dark:hover:bg-indigo-400 rounded-md p-2 text-center font-semibold text-white shadow-sm transition-colors duration-200 flex items-center justify-center h-8 w-8 m-0.5"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="!text-base"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M12 4.5v15m7.5-7.5h-15"
                        />
                    </svg>
                </button>
            </th>
        </tr>
    </thead>
    <tbody class="appendClone">
        <tr class="cloneRow text-sm border-b dark:border-black/30 border-gray-300">
            <td class="text-center counter">1</td>
            {{ $slot }}
            <td>
                <button
                    class="deleteRow bg-red-600 dark:bg-red-500 hover:bg-red-500 dark:hover:bg-red-400 rounded-md p-2 text-center font-semibold text-white shadow-sm transition-colors duration-200 flex items-center justify-center h-8 w-8 m-0.5"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke-width="1.5"
                        stroke="currentColor"
                        class="!text-base"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0"
                        />
                    </svg>
                </button>
            </td>
        </tr>
    </tbody>
</table>
