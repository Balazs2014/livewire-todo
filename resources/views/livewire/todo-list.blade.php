<div>
    @include('livewire.includes.create-todo-box')
    @include('livewire.includes.search-box')

    <div id="todos-list">
        @foreach ($todos as $todo)
            @include('livewire.includes.todo-card')
        @endforeach

        <div class="my-2">
            {{ $todos->links() }}
        </div>
    </div>
    <script>
        window.addEventListener('deleteError', event => {
            Swal.fire({
                icon: 'error',
                title: 'Hiba',
                text: 'Nem sikerült törölni a teendőt.',
                timer: 3000,
                toast: true,
                position: 'top-right',
                timerProgressBar: true,
                showConfirmButton: false
            });
        })

        window.addEventListener('updateError', event => {
            Swal.fire({
                icon: 'error',
                title: 'Hiba',
                text: 'Nem sikerült betölteni a teendőt.',
                timer: 3000,
                toast: true,
                position: 'top-right',
                timerProgressBar: true,
                showConfirmButton: false
            });
        })
    </script>
</div>
