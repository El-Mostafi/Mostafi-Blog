<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Post;
use Livewire\WithPagination;
use Livewire\Attributes\Url;
class Index extends Component
{
    use WithPagination;
    #[Url()]
    public $search;
    public function destroy($postId){
        Post::find($postId)->delete(); 
        }
    public function render()
    {
        return view('livewire.index',[
            'posts' => Post::where('title', 'like',  $this->search . '%')->orderBy('created_at', 'asc')->paginate(8)
        ]);
    }
}
