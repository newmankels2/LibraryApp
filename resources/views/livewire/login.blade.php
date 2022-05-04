<div>
    <div class="w-screen h-screen flex justify-center items-center bg-gray-100">
        <div class="p-10 bg-white rounded flex justify-center items-center flex-col shadow-md">
            @if (session('success'))
                <span class="text-green-500"> {{ session('success') }} </span>
            @elseif (session('error'))
                <span class="text-red-500"> {{ session('error') }}</span>
            @else
                @error('email')
                    <span class="text-red-500"> {{ $message }} </span>
                @enderror
            @endif
            <br>
            <label class="block text-md font-bold mb-2" for="email">Email</label>
            <input type="email" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"
                wire:model="email">
            <label class="block text-md font-bold mb-2" for="password">Password</label>
            <input type="password" class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"
                wire:model="password">
            <button wire:click="login"
                class="bg-indigo-600 hover:bg-blue-700 text-white font-light py-2 px-6 rounded focus:outline-none focus:shadow-outline">Login</button>

        </div>
    </div>
</div>