<form method="GET" action="/">
    @if (request('category'))
        <input type="hidden" name="category" value="{{ request('category') }}">
    @endif
    <input type="text" name="search" placeholder="Find something" value="{{ request('search') }}" class="bg-transparent placeholder-black font-semibold text-sm">
</form>