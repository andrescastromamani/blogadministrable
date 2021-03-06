<?php

namespace App\Http\Livewire\Admin;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $posts = Post::where('user_id',auth()->user()->id)
            ->where('name','LIKE','%'.$this->search.'%')
            ->latest()->paginate(8);
        return view('livewire.admin.posts-index', compact('posts'));
    }
}
