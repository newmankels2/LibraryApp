<?php

namespace App\Http\Livewire;

use App\Models\BookType as Books;
use Livewire\Component;
use Livewire\WithPagination;

class BookType extends Component
{
  public $name;
  use WithPagination;

  public function submit()
  {
    $this->validate([
      'name' => 'required|unique:book_types,typename'
    ]);

    Books::create([
      'typename' => $this->name,
    ]);
    $this->name = null;
    session()->flash('go', 'Books have been added');
  }
  public function delete($id){
    $deletebooktype = Books::find($id);
    $deletebooktype->delete();
  }
  public function render()
  {
    return view('livewire.book-type', ['book' => Books::paginate(5)]);
  }
}
