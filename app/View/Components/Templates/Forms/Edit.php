<?php

namespace App\View\Components\Templates\Forms;

use Illuminate\View\Component;

class Edit extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    
    public $title;
    public $url;

    public function __construct($title, $url)
    {
        $this->title = $title;
        $this->url = $url;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.templates.forms.edit');
    }
}
