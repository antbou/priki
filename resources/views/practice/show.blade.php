<x-app-layout>
    <article class="text-3xl max-w-prose mx-auto py-8">
        {{ $user->fullname }}

        @include('components._practice')

        <div class="font-bold text-xl mb-2 pt-6">Commentaires ({{ count($opinions) }})</div>
        @foreach ($opinions as $opinion)
            <article class="text-3xl rounded overflow-hidden border-solid border-2 my-6 px-6 py-4">
                <div class="flex flex-row mb-2">
                    <a class="font-bold text-base" href="">{{ $opinion->user()->fullname }}</a>
                    <p class="text-base text-gray-500">
                        &nbsp; Créé le {{ $opinion->created_at->isoformat('D MMMM Y') }},
                    </p>
                </div>
                <p class="text-gray-700 text-lg mt-1">
                    {{ $opinion->description }}
                </p>
                <div class="text-sm mt-2">
                    <i class="far fa-thumbs-up"></i>{{ $opinion->comments->where('points', '=', 1)->count() }}
                    <i class="far fa-thumbs-down"></i>{{ $opinion->comments->where('points', '=', -1)->count() }}
                </div>

                <p class="mt-1 text-sm text-gray-500 cursor-pointer" id="dropdown">
                    <i class="fas fa-arrow-circle-down"></i>
                    Afficher les réponses
                    ({{ count($opinion->comments) }})
                </p>
                <div class=" hidden group-hover:block  bg-white  w-auto">
                    @forelse($opinion->comments  as $comment)
                        <div class="container px-5 mx-auto flex flex-wrap">
                            <div class="flex flex-wrap w-full py-2">
                                <div class="flex-grow pl-4">
                                    <h2
                                        class="font-medium title-font text-sm text-gray-900 mb-1 tracking-wider font-bold">
                                        {{ $comment->user->fullname }}</h2>
                                    <p class="leading-relaxed text-sm">{{ $comment->comment }}</p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h3 class="text-center">Aucune comment à afficher ici</h3>
                    @endforelse
                </div>
            </article>
        @endforeach
    </article>
</x-app-layout>
