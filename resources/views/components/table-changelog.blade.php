@props(['changelogs'])
<div class="flex flex-col">
    <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block py-2 min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden shadow-md sm:rounded-lg">
                <table class="min-w-full">
                    <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th scope="col"
                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Qui
                            </th>
                            <th scope="col"
                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Quand
                            </th>
                            <th scope="col"
                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Pourquoi
                            </th>
                            <th scope="col"
                                class="py-3 px-6 text-xs font-medium tracking-wider text-left text-gray-700 uppercase dark:text-gray-400">
                                Valeur précédente
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($changelogs as $changelog)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td
                                    class="py-4 px-6 text-sm font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $changelog->user->fullname }}
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $changelog->created_at->isoformat('D MMMM Y') }}
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $changelog->reason }}
                                </td>
                                <td class="py-4 px-6 text-sm text-gray-500 whitespace-nowrap dark:text-gray-400">
                                    {{ $changelog->previously }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
