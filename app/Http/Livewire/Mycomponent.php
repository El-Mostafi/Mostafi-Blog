<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Mycomponent extends Component
{
    public $num=0;
    // public function __construct($num){
    //     $this->num = $num;
    // }
    public function add(){
        $this->num++;
    }
    public function sub(){
        $this->num--;
    }
    public function render()
    {
        return view('livewire.mycomponent');
    }
}
