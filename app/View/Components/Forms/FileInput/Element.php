<?php

namespace App\View\Components\Forms\FileInput;

use Illuminate\View\Component;

class Element extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $placeholder;
    public $label;

    public function __construct($id = null, $placeholder = null, $label = null)
    {
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->label = $label;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.file-input.element');
    }
}
