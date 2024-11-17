<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $number=0;
    // public function __construct($num){
    //     $this->num = $num;
    // }
    public function add(){
        $this->number++;
    }
    public function sub(){
        $this->number--;
    }
    public function render()
    {
        return view('livewire.counter');
    }
}
