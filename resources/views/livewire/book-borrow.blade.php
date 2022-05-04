<div>

  @if (!$supermode)
    
  <div class="w-screen h-90 flex justify-center items-center bg-gray-100 mt-5">
    <div class="p-10 bg-white rounded flex justify-center items-center flex-col shadow-md">
      <p class="mb-5 text-3xl uppercase text-gray-600">Books Borrowed</p>
      
      
      @if (session('go'))
                <span class="text-green-500">{{ session('go') }}</span>
                @enderror

                
                @error('dateborrowed')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
                <label for="">Date Borrowed</label>
                <input type="date" wire:model="dateborrowed"
                class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" placeholder="Date">
                @error('datereturned')
                <span class="text-red-500">{{ $message }}</span>
                @enderror
                <Label>Date Returned</Label>
                <input type="date" wire:model="datereturned"
                class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" placeholder="Date">
                
                
                <input type="text" placeholder=" SEARCH MEMBER" wire:model="search" class="mb-5 p-3 w-50 focus:border-purple-700 rounded border-2 outline-none">
            @error('name')
            <span class="text-red-500">{{ $message }}</span>
            @enderror
            <select wire:model="name"
            class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none">
            @foreach ($members as $t)
            <option value="{{ $t->id }}">{{ $t->fullname }}</option>
            @endforeach
          </select>
          
          <input type="text" placeholder=" SEARCH BOOK" wire:model="searchbook" class="mb-5 p-3 w-50 focus:border-purple-700 rounded border-2 outline-none">
          @error('book')
          <span class="text-red-500">{{ $message }}</span>
          @enderror
          <select wire:model="book"
          class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none">
          @foreach ($books as $b)
          <option value="{{ $b->id }}" >{{ $b->name }}</option>
          @endforeach
        </select>
        <button wire:click="submit" class="bg-green-500 p-2 hover:bg-green-300">Submit</button>
        
      </div>
      
      
    </div>
    
    @else
      @include('livewire.editbookborrowed')
    @endif
    <div class=" bg-gray-100">
      <div class="w-2/3 mx-auto bg-gray-100">
        <input type="text" wire:model="searchdata"
        class="text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2 border-blue-600 border-2 rounded-md place-items-center text-blue-700 float-right px-1" placeholder="Search">
        <div class="bg-white shadow-md rounded my-6">
          <table class="text-left w-full border-collapse">
              <thead>
                  <tr>
                      <th
                          class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                          Name</th>
                      <th
                          class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                          Book Borrowed</th>
                      <th
                          class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                          Date Borrowed</th>
                      <th
                          class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                          Date Returned</th>
                      <th
                          class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                          Options</th>
                  </tr>
              </thead>
              <tbody>
                  @foreach ($borrowed as $b)

                      <tr class="hover:bg-grey-lighter">
                          <td class="py-4 px-6 border-b border-grey-light">{{ $b->book->name }}</td>
                          <td class="py-4 px-6 border-b border-grey-light">{{ $b->member->fullname }}</td>
                          <td class="py-4 px-6 border-b border-grey-light">{{ $b->dateborrowed }}</td>
                          <td class="py-4 px-6 border-b border-grey-light">{{ $b->datereturned }}</td>
                          <td class="py-4 px-6 border-b border-grey-light">

                              <button wire:click.prevent="enteredit({{ $b->id }})"
                                  class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-yellow-400 hover:bg-yellow-600">Edit</button>


                              <button wire:click="delete({{ $b->id }})"
                                  class="bg-red-500 py-1 px-3 text-xs font-bold">Delete</button>
                          </td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      </div>
      <div>
        {{ $borrowed->links() }}
    </div>
  </div>
</div>
