<?php

namespace App\Http\Livewire;

use App\Models\Book as ModelsBook;
use App\Models\BookType;
use Livewire\Component;

class Book extends Component
{
  public $searchdata;
  public $name, $author, $title, $typename, $findid;
  public $editmode = false;

  public function submit()
  {
    $this->validate([
      'name' => 'required',
      'author' => 'required',
      'title' => 'required',
      'typename' => 'required',
    ]);

    ModelsBook::create([
      'name' => $this->name,
      'Author' => $this->author,
      'title' => $this->title,
      'book_type_id' => $this->typename,
    ]);

    session()->flash('go', 'Book Added');
  }
  public function enteredit($id)
  {
    $data = ModelsBook::where('id', $id)->get();
    $this->name = $data[0]['name'];
    $this->author = $data[0]['Author'];
    $this->title = $data[0]['title'];
    $this->findid = $id;
    $this->editmode = True;
  }

  public function edit()
  {
    $booktbl  = ModelsBook::find($this->findid);
    $booktbl->name = $this->name;
    $booktbl->Author = $this->author;
    $booktbl->title = $this->title;
    $booktbl->save();
    $this->name   = null;
    $this->author = null;
    $this->title = null;
    $this->editmode = false;
  }

  public function delete($id)
  {
    ModelsBook::find($id)->delete();
  }


  public function render()
  {
    $searchdata = '%'.$this->searchdata.'%'; 
    return view('livewire.book', ['books' => ModelsBook::where('name','LIKE',$searchdata)->with('book_type')->paginate(5), 'type' => BookType::all()]);
  }
}
