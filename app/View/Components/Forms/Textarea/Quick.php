<?php

namespace App\View\Components\Forms\Textarea;

use Illuminate\View\Component;

class Quick extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $placeholder;
    public $value;

    public function __construct($id = null, $placeholder = null, $value = null)
    {
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->value = $value;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.textarea.quick');
    }
}
