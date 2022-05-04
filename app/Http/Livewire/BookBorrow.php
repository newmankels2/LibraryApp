<?php

namespace App\Http\Livewire;

use App\Models\Book;
use App\Models\BookBorrowed;
use App\Models\Member;
use Livewire\Component;

class BookBorrow extends Component
{
  public $search, $name, $book, $searchbook, $dateborrowed, $datereturned, $searchdata;
  public $secretidentification;
  public $supermode = false;


  public function submit()
  {
    $this->validate([
      'dateborrowed' => 'required',
      'name' => 'required',
      'book' => 'required',
    ]);

    BookBorrowed::create([
      'book_id' => $this->book,
      'member_id' => $this->name,
      'dateborrowed' => $this->dateborrowed,
      'datereturned' => $this->datereturned
    ]);

    session()->flash('go','Success With Stuff');
  }


  public function enteredit($id)
  {
    $data = BookBorrowed::with('book', 'member')->where('id', $id)->get();
    $this->book = $data[0]['book']['name'];
    $this->name = $data[0]['member']['fullname'];
    $this->dateborrowed = $data[0]['dateborrowed'];
    $this->datereturned = $data[0]['datereturned'];
    $this->secretidentification = $id;
    $this->supermode = True;
  }
  public function edit(){

    $dataer = BookBorrowed::find($this->secretidentification);
    $dataer->datereturned =$this->datereturned;
    $dataer->dateborrowed =$this->dateborrowed;
    $dataer->fullname =$this->name;
    $dataer->fullname =$this->name;
  }

  public function delete($id){  
    BookBorrowed::find($id)->delete();
  }

  public function render()
  {
    $search = '%' . $this->search . '%';
    $searchbook = '%' . $this->searchbook . '%';
    $searchdata = '%' . $this->searchdata . '%';
    $books = Book::where('name', 'LIKE', $searchbook)->get();
    $members = Member::where('fullname', 'LIKE', $search)->get();

    $borrowed = BookBorrowed::with([
      'book',
      'member' => function ($query) use ($searchdata) {
        $query->where('fullname', 'LIKE', $searchdata);
      }
    ])->whereHas('member', function ($query) use ($searchdata) {
      $query->where('fullname', 'LIKE', $searchdata);
    })
      ->orderBy('dateborrowed', 'asc')->paginate(5);
      
    return view('livewire.book-borrow', compact('books', 'members', 'borrowed'));
  }
}
