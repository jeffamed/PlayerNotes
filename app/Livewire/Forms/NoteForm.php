<?php

namespace App\Livewire\Forms;

use Livewire\Form;

class NoteForm extends Form
{
    public string $comments = '';

    protected function rules(): array
    {
        return [
            'comments' => 'required | string | max:255 | min:3'
        ];
    }
}
