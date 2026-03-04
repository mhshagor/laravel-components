@props([
    'editModal' => ['id' => '', 'namespace' => '', 'modal' => '', 'url' => '', 'class' => ''],
    'deleteModal' => ['id' => '', 'namespace' => '', 'url' => '', 'class' => ''],
    'edit' => ['url' => '', 'class' => ''],
])

{{-- @isset($status)
    <form action="{{ route('classGroups.status', $row->id) }}"
        method="POST"
        class="inline">
        @csrf
        @method('PUT')
        <button type="submit"
            class="text-red-600 hover:text-red-900 ml-2">Status</button>
    </form>
@endisset
@isset($edit)
    <a href="{{ route('classGroups.edit', $row->id) }}"
        class="text-blue-600 hover:text-blue-900">Edit</a>
@endisset
@isset($delete)
    <form action="{{ route('classGroups.destroy', $row->id) }}"
        method="POST"
        class="inline">
        @csrf
        @method('DELETE')
        <button type="submit"
            class="text-red-600 hover:text-red-900 ml-2">Delete</button>
    </form>
@endisset --}}

<div class="flex items-center gap-1">
    @if($editModal['id'] !== '')
        <x-sgd.form.button
            role="edit"
            class="{{ $editModal['class'] ?? '!p-1 !m-0 !rounded-sm' }} open_modal"
            iconClass="!text-sm"
            :title="false"
            data-id="{{ $editModal['id'] }}"
            data-namespace="{{ $editModal['namespace'] }}"
            data-modal="{{ $editModal['modal'] }}"
            data-url="{{ $editModal['url'] }}"
        />
    @endif
    @if($deleteModal['id'] !== '')
        <x-sgd.form.button
            role="delete"
            class="{{ $deleteModal['class'] ?? '!p-1 !m-0 !rounded-sm' }} open_modal_delete"
            iconClass="!text-sm"
            :title="false"
            :url="$deleteModal['url']"
            data-namespace="{{ $deleteModal['namespace'] }}"
            data-id="{{ $deleteModal['id'] }}"
        />
    @endif
    @if($edit['url'] !== '')
        <x-sgd.form.button
            role="edit"
            class="{{ $edit['class'] ?? '!p-1 !m-0 !rounded-sm' }}"
            iconClass="!text-sm"
            :title="false"
            :href="$edit['url']"
        />
    @endif
</div>
