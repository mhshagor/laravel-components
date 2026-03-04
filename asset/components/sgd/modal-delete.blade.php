<x-sgd.modal modalId="deleteModal">
    <x-sgd.form method="delete">
        <div class="bg-white px-4 pb-4 pt-5 sm:p-6 sm:pb-4">
            <h3 class="text-base font-semibold leading-6 text-gray-900 mb-4" id="modal-title">
                {{ Str::headline('Delete Item') }}
            </h3>
            <p>Are you sure you want to delete this item?</p>
        </div>
        <div class="bg-gray-50 px-4 py-3 sm:flex sm:flex-row-reverse sm:px-6">
            <x-sgd.form.button type="button" onclick="closeModal('deleteModal')" role="cancel" />
            {{ $slot }}
        </div>
    </x-sgd.form>
</x-sgd.modal>
