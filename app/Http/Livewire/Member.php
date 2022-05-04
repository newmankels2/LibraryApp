<?php

namespace App\Http\Livewire;

use App\Models\Member as ModelsMember;
use Livewire\Component;
use Livewire\WithPagination;
use PhpParser\Node\Expr\AssignOp\Mod;

class Member extends Component
{
  public $searchdata;
  public $fullname, $email, $phone, $findid;
  public $editmode = false;
  use WithPagination;

  public function submit()
  {
    $this->validate([
      'fullname' => 'required',
      'email' => 'required|unique:members,email',
      'phone' => 'required',
    ]);

    ModelsMember::create([
      'fullname' => $this->fullname,
      'email' => $this->email,
      'phone' => $this->phone,
    ]);
    session()->flash('go', 'Student Added');
    $this->fullname = null;
    $this->email = null;
    $this->phone = null;
  }
  public function enteredit($id)
  {
    $member = ModelsMember::where('id', $id)->get();
    $this->fullname = $member[0]['fullname'];
    $this->email = $member[0]['email'];
    $this->phone = $member[0]['phone'];
    $this->editmode = True;
    $this->findid = $id;
  }
  public function edit()
  {
    $tbldata = ModelsMember::find($this->findid);
    $tbldata->fullname = $this->fullname;
    $tbldata->email = $this->email;
    $tbldata->phone = $this->phone;
    $tbldata->save();
    $this->editmode = false;
    $this->fullname = null;
    $this->email = null;
    $this->phone = null;
  }

  public function delete($id)
  {
    $delete = ModelsMember::find($id);
    $delete->delete();
  }

  public function back()
  {
    $this->fullname = null;
    $this->email = null;
    $this->phone = null;
    $this->editmode = false;
  }


  public function render()
  {
    $searchdata = '%'.$this->searchdata.'%';
    return view('livewire.member', ['member' => ModelsMember::where('fullname','LIKE',$searchdata)->paginate(4)]);
  }
}
