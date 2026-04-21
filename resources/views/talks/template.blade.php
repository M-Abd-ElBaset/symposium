<div class="mx-auto max-w-2xl py-8">
    @csrf
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-6">
                    <label for="title" class="block text-sm font-medium leading-6 text-gray-900">Title</label>
                    <div class="mt-2">
                        <input id="title" type="text" name="title"  value="{{old('title', $talk->title)}}" autocomplete="given-name" class="block w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 shadow-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        <x-input-error :messages="$errors->get('title')" />
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="type" class="block text-sm font-medium leading-6 text-gray-900">Type</label>
                    <div class="mt-2 grid grid-cols-1">
                        <select id="type" name="type" autocomplete="country-name" class="col-start-1 row-start-1 w-full appearance-none rounded-md border border-gray-300 bg-white py-1.5 pl-3 pr-8 text-base text-gray-900 shadow-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">
                            @foreach(\App\Enums\TalkType::cases() as $talkType)
                                <option value="{{$talkType->value}}" {{old('type', $talk->type) == $talkType->value ? 'selected':''}}>{{ucwords($talkType->value)}}</option>
                            @endforeach
                        </select>
                        <svg viewBox="0 0 16 16" fill="currentColor" data-slot="icon" aria-hidden="true" class="pointer-events-none col-start-1 row-start-1 mr-2 h-5 w-5 self-center justify-self-end text-gray-500 sm:h-4 sm:w-4">
                            <path d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" fill-rule="evenodd" />
                        </svg>
                        <x-input-error :messages="$errors->get('type')" />
                    </div>
                </div>

                <div class="sm:col-span-3">
                    <label for="length" class="block text-sm font-medium leading-6 text-gray-900">Length</label>
                    <div class="mt-2">
                        <input id="length" type="text" name="length" value="{{old('length', $talk->length)}}" autocomplete="family-name" class="block w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 shadow-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6" />
                        <x-input-error :messages="$errors->get('length')" />
                    </div>
                </div>

                <div class="col-span-full">
                    <label for="abstract" class="block text-sm font-medium leading-6 text-gray-900">Abstract</label>
                    <div class="mt-2">
                        <textarea id="abstract" name="abstract" rows="3" class="block w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 shadow-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">{{old('abstract', $talk->abstract)}}</textarea>
                        <x-input-error :messages="$errors->get('abstract')" />
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600">Describe the talk in a few sentences, in a way that's compelling and informative and could be presented to the public.</p>
                </div>

                <div class="col-span-full">
                    <label for="organizer_notes" class="block text-sm font-medium leading-6 text-gray-900">Organizer Notes</label>
                    <div class="mt-2">
                        <textarea id="organizer_notes" name="organizer_notes" rows="3" class="block w-full rounded-md border border-gray-300 bg-white px-3 py-1.5 text-base text-gray-900 placeholder:text-gray-400 shadow-sm focus:border-indigo-600 focus:ring-2 focus:ring-indigo-600 sm:text-sm sm:leading-6">{{old('organizer_notes', $talk->organizer_notes)}}</textarea>
                        <x-input-error :messages="$errors->get('organizer_notes')" />
                    </div>
                    <p class="mt-3 text-sm leading-6 text-gray-600">Write any notes you may want to pass to an event organizer about this talk.</p>
                </div>



            </div>
        </div>
    </div>

    <div class="mt-6 flex items-center justify-end gap-x-6">
        <button type="button" class="text-sm font-semibold leading-6 text-gray-900">Cancel</button>
        <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
    </div>
</div>
