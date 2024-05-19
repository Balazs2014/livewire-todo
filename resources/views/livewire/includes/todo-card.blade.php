<div wire:key="{{ $todo->id }}" class="todo mb-5 card px-5 py-6 bg-white col-span-1 border-t-2 border-blue-500 hover:shadow">
    <div class="flex justify-between space-x-2">
        <h3 class="text-lg text-semibold text-gray-800">{{ $todo->name }}</h3>
    </div>
    <span class="text-xs text-gray-500"> {{ $todo->created_at }} </span>
</div>