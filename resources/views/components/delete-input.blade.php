<form method="POST" action="{{ $route }}">
    @method('DELETE')
    @csrf
    <a
        href="#"
        class="underline bg-red-700 border border-solid border-red-600"
        onclick="event.preventDefault(); this.closest('form').submit();"
    >
        {{ $text }}
    </a>
</form>
