@props(['modalId'])
<div id="{{ $modalId }}" class="fixed inset-0 z-50 invisible overflow-y-auto" aria-labelledby="modal-title"
    role="dialog" aria-modal="true" data-modal-id="{{ $modalId }}" data-action="add">
    <div class="modal-backdrop fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity duration-300 ease-out opacity-0"
        onclick="closeModal('{{ $modalId }}')">
    </div>
    <div class="flex min-h-full items-end justify-center p-4 text-center sm:items-center sm:p-0">
        <div
            class="modal-panel relative transform overflow-hidden rounded-lg bg-white text-left shadow-xl transition-all duration-300 ease-out opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95 sm:my-8 sm:w-full sm:max-w-lg">
            {{ $slot }}
        </div>
    </div>
</div>
