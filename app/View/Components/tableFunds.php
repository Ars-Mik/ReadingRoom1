<?php

namespace App\View\Components;

use Illuminate\View\Component;

class tableFunds extends Component
{

    public $json;
    
    public function __construct($json = [])
    {
        $this->json = $json;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|array
     */
    public function render()
    {
        return view('components.tableFunds');
    }
}
