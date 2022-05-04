<nav
    class="font-sans flex flex-col text-center sm:flex-row sm:text-left sm:justify-between py-4 px-6 bg-white shadow sm:items-baseline w-full">
    <div class="mb-2 sm:mb-0">
        @auth()

            <a href="{{ url('logout') }}" class="text-2xl no-underline text-grey-darkest hover:text-blue-dark">Log out</a>

        @endauth

    </div>
    <div>
        
        <a href="{{ url('member') }}"
            class="text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2">Member</a>
        <a href="{{ url('book') }}" class="text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2">Books</a>
        <a href="{{ url('booktype') }}" class="text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2">Book
            Type</a>
        <a href="{{ url('borrow') }}" class="text-lg no-underline text-grey-darkest hover:text-blue-dark ml-2">Books
            Borrowed</a>
    </div>
</nav>
<div>
</div>
