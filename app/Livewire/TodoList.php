<?php

namespace App\Livewire;

use App\Models\Todo;
use Exception;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class TodoList extends Component
{

    use WithPagination;

    #[Rule('required|min:3|max:50')]
    public $name;

    public $search;

    public $editingTodoId;

    #[Rule('required|min:3|max:50')]
    public $editingTodoName;

    public function create() {
        $validated = $this->validateOnly('name');

        Todo::create($validated);

        $this->reset('name');

        session()->flash('success', 'Created.');

        $this->resetPage();
    }

    public function toggle($todoId) {
        $todo = Todo::find($todoId);

        $todo->completed = !$todo->completed;

        $todo->save();
    }

    public function edit($todoId) {
        $this->editingTodoId = $todoId;
        
        try {
            $this->editingTodoName = Todo::find($todoId)->name;
        } catch(Exception $e) {
            $this->dispatch('updateError');
        }
    }

    public function update() {
        $this->validateOnly('editingTodoName');

        try {
            Todo::findOrFail($this->editingTodoId)->update(
                [
                    'name' => $this->editingTodoName
                ]
            );
        } catch(Exception $e) {
            $this->dispatch('updateError');
        }

        Todo::find($this->editingTodoId)->update(
            [
                'name' => $this->editingTodoName
            ]
        );

        $this->cancelEdit();
    }

    public function cancelEdit() {
        $this->reset('editingTodoId','editingTodoName');
    }

    public function delete($todoId) {
        try {
            Todo::findOrFail($todoId)->delete();
        } catch(Exception $e) {
            $this->dispatch('deleteError');
        }
    }

    public function render()
    {
        return view('livewire.todo-list', [
            'todos' => Todo::latest()->where('name','like',"%{$this->search}%")->paginate(5)
        ]);
    }
}
