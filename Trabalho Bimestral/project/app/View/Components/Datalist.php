<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Datalist extends Component
{
    public $header;
    public $data;
    // Parâmetros recebidos via construtor
    public function __construct($header, $data)
    {
        $this->header = $header;
        $this->data = $data;
    }
    public function render()
    {
        return view('components.datalist');
    }
}
