<div wire:key="{{ $todo->id }}"
    class="todo mb-5 card px-5 py-6 bg-white col-span-1 border-t-2 border-blue-500 hover:shadow">
    <div class="flex justify-between space-x-2">

        <div class="flex">
            @if ($todo->completed)
                <input wire:click="toggle({{ $todo->id }})" class="mr-2" type="checkbox" checked>
            @else
                <input wire:click="toggle({{ $todo->id }})" class="mr-2" type="checkbox">
            @endif

            @if ($editingTodoId === $todo->id)
                <div>
                    <input wire:model="editingTodoName" type="text" placeholder="Todo.."
                        class="bg-gray-100  text-gray-900 text-sm rounded block w-full p-2.5">

                    @error('editingTodoName')
                        <span class="mt-1 text-red-500 text-xs block">{{ $message }}</span>
                    @enderror
                </div>
            @else
                <h3 class="text-lg text-semibold text-gray-800">{{ $todo->name }}</h3>
            @endif


        </div>


        <div class="flex items-center space-x-2">
            <button wire:click="edit({{ $todo->id }})"
                class="text-sm text-teal-500 font-semibold rounded hover:text-teal-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-4 h-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                </svg>
            </button>
        </div>
    </div>
    <span class="text-xs text-gray-500"> {{ $todo->created_at }} </span>
    <div class="mt-3 text-xs text-gray-700">
        @if ($editingTodoId === $todo->id)
            <button wire:click="update"
                class="mt-3 px-4 py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">Update</button>
            <button wire:click="cancelEdit"
                class="mt-3 px-4 py-2 bg-red-500 text-white font-semibold rounded hover:bg-red-600">Cancel</button>
        @endif

    </div>
</div>
