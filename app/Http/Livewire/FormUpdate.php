<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;

class FormUpdate extends Component
{   
    public $title;
    public $description;

    public $myid;
    
    public function mount($title)
    {
        $this->title = $title->title;
        $this->description = $title->description;
        $this->myid = $title->id;
    }
    public function render()
    {
        
        return view('livewire.form-update');
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
        $singlePostFromDB=Post::find($this->myid);
        $singlePostFromDB->update([
            'title' => $this->title,
            'description' => $this->description,
        ]);
        return redirect()->route('posts.show',$singlePostFromDB->id);
    }
}
