<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TablaClientes extends Component
{
    public $clientes;
    public $clase;


    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($clientes, $clase = '')
    {
        $this->clientes = $clientes;
        $this->clase = $clase;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tabla-clientes');
    }
}
