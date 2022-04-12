<?php

namespace App\View\Components\Forms\CheckboxRadio;

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
    public $value;
    public $type;
    public $checked;
    public $color;

    public function __construct($id = null, $placeholder = null, $type = null, $value = null, $checked = null, $color = null)
    {
        $this->id = $id;
        $this->placeholder = $placeholder;
        $this->value = $value;
        $this->checked = $checked;
        $this->type = $type;
        $this->color = $color;
    }

    public function isChecked($option)
    {
        if (is_array($this->checked)){
            foreach($this->checked as $check){
                if ($option ==  $check) return true;
            }
        }
        return $option == $this->checked;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.forms.checkbox-radio.element');
    }
}
