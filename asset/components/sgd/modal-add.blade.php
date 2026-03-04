@props(['modalId', 'title', 'method' => 'PUT'])

<div id="{{ $modalId }}" class="fixed inset-0 z-50 invisible overflow-y-auto" aria-labelledby="modal-title"
    role="dialog" aria-modal="true" data-modal-id="{{ $modalId }}" data-action="add">

    <div class="modal-backdrop fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity duration-300 ease-out opacity-0"
        onclick="closeModal('{{ $modalId }}')">
    </div>

    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">

        <div
            class="modal-panel relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all duration-300 ease-out opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95 sm:my-8 sm:w-full sm:max-w-lg">

            <x-sgd.form method="{{ $method }}">
                <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
                    <h3 class="text-base font-semibold leading-6 text-gray-900 mb-4" id="modal-title">
                        {{ Str::headline($title) }}
                    </h3>
                    <div class="space-y-4">
                        {{ $slot }}
                    </div>
                </div>

                <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
                    <x-sgd.form.button type="button" onclick="closeModal('{{ $modalId }}')" text="Cancel" />
                    <x-sgd.form.button type="button" onclick="saveData(event)" text="Save" />
                </div>
            </x-sgd.form>

        </div>
    </div>
</div>
