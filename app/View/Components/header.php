<?php

namespace App\View\Components;

use Illuminate\View\Component;

class header extends Component
{

    /**
     *
     * @var string
     */
    public $title;

    /**
     *
     * @var boolean
     */
    public $search;

    /**
     * Create a new component instance.
     * 
     * 
     * @param  string  $title
     * @param  boolean  $search
     * @return void
     */


    public function __construct($title = '', $search = false)
    {
        $this->title = $title;
        $this->search = $search;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header');
    }
}
