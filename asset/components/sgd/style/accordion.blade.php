@props([
    'title' => 'Accordion',
    'open' => false,
    'id' => Str::uuid(),
    'color' => '',
])

<div
    class="sgd-accordion"
    id="acc-{{ $id }}"
    data-color="{{ $color }}"
>
    <div class="sgd-accordion-item">
        <button
            type="button"
            class="sgd-accordion-btn"
            data-default="{{ $open ? 'true' : 'false' }}"
        >
            <span class="">{{ Str::headline($title) }}</span>
            <svg
                class="sgd-accordion-icon"
                fill="none"
                stroke="currentColor"
                viewBox="0 0 24 24"
            >
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    stroke-width="2"
                    d="M19 9l-7 7-7-7"
                />
            </svg>
        </button>

        <div class="sgd-accordion-content">
            <div class="sgd-accordion-content-body">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>
