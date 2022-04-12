<?php

namespace App\View\Components\Gallery;

use Illuminate\View\Component;

class Fancy extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $title;
    public $shuffle;
    public $sort;

    public function __construct($title = null, $shuffle = null, $sort = null)
    {
        $this->title = $title;
        $this->shuffle = $shuffle == null ? false : true;
        $this->sort = $sort == null ? false : true;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.gallery.fancy');
    }
}
