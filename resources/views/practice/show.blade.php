<x-app-layout>
    <article class="text-3xl max-w-prose mx-auto py-8">

        @if (Session::has('flash_message'))
            <x-alert type="{{ Session::get('flash_type') }}" :message="Session::get('flash_message')"
                class="mb-4" />
        @endif

        {{ $user->fullname }}

        <x-practice :practice="$practice">
            <x-slot name="headers">
                @can('update', $practice)
                    <x-drop>
                        {{-- text activating the dropdown --}}
                        <x-slot name="label">
                            <i class="fas fa-edit"></i>
                            Modifier le titre
                        </x-slot>
                        {{-- value in the dropdown --}}
                        <x-slot name="slot">
                            {{-- form --}}
                            <x-practice-title-form :practice="$practice"></x-practice-title-form>
                        </x-slot>
                    </x-drop>
                @endcan
            </x-slot>
            <x-slot name="tags">
                <x-tag type="lady">{{ __($practice->domain->name) }}</x-tag>
                @if (Gate::allows('isModo'))
                    <x-tag type="man">{{ __($practice->state()->first()->name) }}</x-tag>
                @endif
            </x-slot>
        </x-practice>

        @if (Auth::check() && Auth::user()->can('publish', $practice))
            <div class="font-bold text-xl mb-2 pt-6">
                <form action="{{ route('practice.publish', $practice) }}" method="post">
                    @csrf
                    <input type="hidden" value="{{ $practice->id }}" name="practice">
                    <div class="row">
                        <button type="submit"
                            class="text-green-500 bg-transparent border border-solid border-green-500 hover:bg-green-500 hover:text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150">Publi??</button>
                    </div>
                </form>
            </div>
        @endif
        <div class="font-bold text-xl mb-2 pt-6">Commentaires ({{ count($opinions) }})</div>
        @foreach ($opinions as $opinion)
            <x-opinion :opinion="$opinion">
                {{-- Accord??on --}}
                <x-drop>
                    {{-- text activating the dropdown --}}
                    <x-slot name="label">
                        <i class="fas fa-arrow-circle-down"></i>
                        Afficher les r??ponses ({{ count($opinion->comments) }})
                    </x-slot>
                    {{-- value in the dropdown --}}
                    <x-slot name="slot">
                        {{-- form --}}
                        <x-user-opinion-form :opinion="$opinion"></x-user-opinion-form>
                        {{-- comments --}}
                        @forelse($opinion->comments as $comment)
                            <x-comment :description="$comment->comment" :username="$comment->user->fullname">
                            </x-comment>
                        @empty
                            <h3 class="text-center">Aucun commentaire ?? afficher ici</h3>
                        @endforelse
                    </x-slot>
                </x-drop>
                {{-- reference section --}}
                <div class="flex flex-col ">
                    @foreach ($opinion->references()->get() as $reference)
                        <div class="text-sm mt-2">
                            <i class="fas fa-external-link-alt"></i>&nbsp;
                            @if (empty($reference->url))
                                {{ $reference->description }}
                            @else
                                <a href="{{ $reference->url }}" target="_blank">{{ $reference->description }}</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </x-opinion>
        @endforeach

        <div class="font-bold text-xl mb-2 pt-6">Changements</div>
        <x-table-changelog :changelogs="$practice->changelogs()->get()">
        </x-table-changelog>
    </article>
</x-app-layout>
