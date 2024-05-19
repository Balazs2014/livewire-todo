<div>
    @include('livewire.includes.create-todo-box')
    <div id="todos-list">
        @foreach ($todos as $todo)
            @include('livewire.includes.todo-card')
        @endforeach

    </div>
</div>
