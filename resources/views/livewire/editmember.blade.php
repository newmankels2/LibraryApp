<div>
  <div class="w-screen h-90 flex justify-center items-center bg-gray-100 mt-5">
    <div class="p-10 bg-white rounded flex justify-center items-center flex-col shadow-md">
        <p class="mb-5 text-3xl uppercase text-gray-600">Add Teacher</p>
        @error('email')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        @if (session('go'))
            <span class="text-green-500">{{ session('go') }}</span>
        @enderror
        <input type="text" wire:model="fullname"
            class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" placeholder="Enter Name">
        <input type="email" wire:model="email"
            class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"
            placeholder="Enter Email">
        <input type="text" wire:model="phone"
            class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none" placeholder="#Tel">
        <button wire:click="edit" class="bg-green-500 p-2 hover:bg-green-300">Edit Member</button>
        <button wire:click="back" class="bg-red-500 p-2 hover:bg-red-300">Back</button>
  </div>
  </div>
</div>