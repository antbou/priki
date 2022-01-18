<x-app-layout>
    <article class="text-3xl max-w-prose mx-auto py-8">
        {{ $user->fullname }}

        @include('partials._practice')

        <div class="font-bold text-xl mb-2 pt-6">Commentaires ({{ count($opinions) }})</div>
        @foreach ($opinions as $opinion)
            <article class="text-3xl rounded bg-white overflow-hidden border-solid border-2 my-6 px-6 py-4">
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

                <div x-data="{ show: false }">
                    <button @click="show = !show" :aria-expanded="show ? 'true' : 'false'" :class="{ 'active': show }"
                        class="mt-1 text-sm text-gray-500 cursor-pointer">
                        <i class="fas fa-arrow-circle-down"></i>
                        Afficher les réponses ({{ count($opinion->comments) }})
                    </button>

                    <div x-show="show" class="group-hover:block  bg-white  w-auto">
                        @forelse($opinion->comments  as $comment)
                            @include('partials._comment', [
                            'description' => $comment->comment,
                            'username'=>$comment->user->fullname
                            ])
                        @empty
                            <h3 class="text-center">Aucune comment à afficher ici</h3>
                        @endforelse
                    </div>
                </div>

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
            </article>
        @endforeach
    </article>
</x-app-layout>
