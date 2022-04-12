<?php

namespace App\View\Components\Modals;

use Illuminate\View\Component;

class Element extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $title;
    public $cancelColor;
    public $cancelText;
    public $size;

    public function __construct($id = null, $title = null, $cancelColor = null, $cancelText = null, $size = null)
    {
        $this->id = $id;
        $this->title = $title;
        $this->cancelColor = $cancelColor;
        $this->cancelText = $cancelText;
        $this->size = $size;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modals.element');
    }
}
