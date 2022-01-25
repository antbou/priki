<x-app-layout>
    <article class="text-3xl max-w-prose mx-auto py-8">

        @if (Session::has('flash_message'))
            <x-alert type="{{ Session::get('flash_type') }}" :message="Session::get('flash_message')"
                class="mb-4" />
        @endif

        {{ $user->fullname }}

        @include('practice._practice', ['hideLink' => true])

        @if (Auth::check() && Auth::user()->can('publish', $practice))
            <div class="font-bold text-xl mb-2 pt-6">
                <a href="{{ route('practice.publish', [$practice]) }}"
                    class="text-green-500 bg-transparent border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                    type="button">
                    Publié
                </a>
            </div>

        @endif

        <div class="font-bold text-xl mb-2 pt-6">Commentaires ({{ count($opinions) }})</div>
        @foreach ($opinions as $opinion)
            @include('opinion._opinion')
        @endforeach
    </article>
</x-app-layout>
