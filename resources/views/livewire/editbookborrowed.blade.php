<div>

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

            @error('name')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <input wire:model="name" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none">
            
            @error('book')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
            <input wire:model="book" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none">

            <button wire:click="edit" class="bg-green-500 p-2 hover:bg-green-300">Submit</button>

    </div>
</div>
