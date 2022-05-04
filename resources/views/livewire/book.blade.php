  <div>
      @if (!$editmode)

    <div class="w-screen h-90 flex justify-center items-center bg-gray-100 mt-5">         
      <div class="p-10 bg-white rounded flex justify-center items-center flex-col shadow-md">
        <p class="mb-5 text-3xl uppercase text-gray-600">Add Books</p>
        
               
                @if (session('go'))
                    <span class="text-green-500">{{ session('go') }}</span>
                @enderror
                @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

                <input type="text" wire:model="name"
                    class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"
                    placeholder="Enter Book Name">
                    @error('author')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                <input type="text" wire:model="author"
                    class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"
                    placeholder="Enter Author">
                    @error('title')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                <input type="text" wire:model="title"
                    class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" placeholder="title">

                    @error('typename')
                    <span class="text-red-500">{{ $message }}</span>
                @enderror
                <select wire:model="typename" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none">
                    @foreach ($type as $t)
                        <option value="{{ $t->id }}">{{ $t->typename }}</option>
                    @endforeach
                </select>
                <button wire:click="submit" class="bg-green-500 p-2 hover:bg-green-300">Add Books</button>
              
        </div>
      
    </div>
@else
    @include('livewire.editbook')
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
                            Author</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Book Category</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Title</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Availability</th>
                        <th
                            class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">
                            Options</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($books as $b)

                        <tr class="hover:bg-grey-lighter">
                            <td class="py-4 px-6 border-b border-grey-light">{{ $b->name }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $b->Author }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $b->book_type->typename }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $b->title }}</td>
                            <td class="py-4 px-6 border-b border-grey-light">{{ $b->Availability }}</td>
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
    </div>
    <div>
        {{ $books->links() }}
    </div>
</div>
</div>
