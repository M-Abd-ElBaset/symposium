<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Conferences') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">
                    <ul class="list-disc pl-4">
                    @foreach($conferences as $conference)
                        <li>
                            <div class="flex items-center gap-2">
                                @php
                                    $isFavourited = Auth::user()->favouritedConferences->pluck('id')->contains($conference->id);
                                @endphp

                                <button
                                    type="button"
                                    onclick="{{ $isFavourited ? 'unFavouriteConference' : 'favouriteConference' }}({{ $conference->id }});"
                                    class="inline-flex h-5 w-5 items-center justify-center"
                                    aria-label="{{ $isFavourited ? 'Unfavourite conference' : 'Favourite conference' }}"
                                >
                                    @if($isFavourited)
                                        <img
                                            src="{{ asset('storage/images/star-yellow2.png') }}"
                                            alt=""
                                            class="h-4 w-4"
                                        >
                                    @else
                                        <img
                                            src="{{ asset('storage/images/star-faint.png') }}"
                                            alt=""
                                            class="h-4 w-4"
                                        >
                                    @endif
                                </button>

                                <a href="{{ route('conferences.show', ['conference' => $conference]) }}" class="hover:underline">
                                    {{ $conference->title }}
                                </a>
                            </div>
                        </li>
                    @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        const csrfToken = document.head.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

        function favouriteConference(conferenceId){
            fetch(`/conferences/${conferenceId}/favourites`, {
               method: "POST",
               credentials: "same-origin",
               headers: {
                   "Accept": "application/json",
                   "X-CSRF-TOKEN": csrfToken
               }
            }).then(() => window.location.reload());
        }

        function unFavouriteConference(conferenceId){
            fetch(`/conferences/${conferenceId}/favourites`, {
               method: "DELETE",
               credentials: "same-origin",
               headers: {
                   "Accept": "application/json",
                   "X-CSRF-TOKEN": csrfToken
               }
            }).then(() => window.location.reload());
        }
    </script>
</x-app-layout>
