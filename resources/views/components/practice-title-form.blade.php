@props(['practice'])

<div class="container px-5 mx-auto flex flex-wrap">
    <div class="flex flex-wrap w-full py-2 border-2 rounded-lg mt-3">
        <div class="flex-grow pl-4">
            <form action="{{ route('practice.update', $practice) }}" method="POST">
                @csrf
                <div class="col-span-6 sm:col-span-6 pr-5">
                    <label for="title" class="block text-sm font-medium text-gray-700">Titre</label>
                    <input type="text" name="title" id="title" autocomplete="given-name"
                        class="pr-0 focus:ring-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        placeholder="Ajouter un titleaire ..." value="{{ $practice->title }}">
                    @error('title')
                        <div class="block text-sm font-medium text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-span-6 sm:col-span-6 pr-5">
                    <label for="reason" class="block text-sm font-medium text-gray-700">Raison</label>
                    <input type="text" name="reason" id="reason" autocomplete="given-name"
                        class="pr-0 focus:ring-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                        placeholder="Ajouter un raison ..." value="{{ $practice->reason }}">
                    @error('reason')
                        <div class="block text-sm font-medium text-red-400">{{ $message }}</div>
                    @enderror
                </div>

                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Modifier
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
