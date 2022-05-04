<div>
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
                  placeholder="Enter Name">
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

              <button wire:click="edit({{ $books['id'] }})" class="bg-green-500 p-2 hover:bg-green-300">Edit Books</button>
      </div>
  </div>
</div>