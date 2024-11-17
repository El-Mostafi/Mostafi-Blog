<?php

namespace App\Http\Livewire;
use App\Models\Post;
use App\Models\User;
use Livewire\Component;

class FormStore extends Component
{
    public $title;
    public $description;
    public function render()
    {
        return view('livewire.form-store');
    }
    public function Updated($field){
        $this->validateOnly($field,[
            'title'=> ['required','min:2'],
            'description'=> ['required','min:12'],
        ]);
    }
    public function submitForm()
    {
        $this->validate([
            'title'=> ['required','min:2'],
            'description'=> ['required','min:12'],
        ]);
        Post::create([
            'title' =>$this->title,
            'description' =>$this->description,
            'user_id' =>auth()->user()->id
        ]);
        return redirect()->route('posts.index');
    }
}
