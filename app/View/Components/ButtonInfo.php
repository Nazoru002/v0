<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ButtonInfo extends Component
{
    public $edit = 0;
    public $eye = 0;
    public $trash = 0;
    public $times = 0;
    public $undo = 0;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($edit = 0, $eye = 0, $trash = 0, $times = 0, $undo = 0)
    {
        $this->eye = $eye;
        $this->edit = $edit;
        $this->trash = $trash;
        $this->times = $times;
        $this->undo = $undo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button-info');
    }
}
