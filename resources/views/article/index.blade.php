<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                {{ __('Article') }}
            </h2>
            <a href="{{ route('article.create') }}" class="px-4 py-2 border border-yellow-500 rounded-md hover:bg-yellow-500 hover:text-white">CREATE</a>
        </div>
    </x-slot>

    {{-- {{dd($articles)}} --}}
    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="w-full text-sm border-collapse table-auto">
                        <thead>
                            <tr>
                                <th class="p-4 pt-0 pb-3 pl-8 font-medium text-left border-b text-slate-400">Title</th>
                                <th class="p-4 pt-0 pb-3 pl-8 font-medium text-left border-b text-slate-400">Description</th>
                                <th class="p-4 pt-0 pb-3 pl-8 font-medium text-left border-b text-slate-400">Created At</th>
                                <th class="p-4 pt-0 pb-3 pl-8 font-medium text-left border-b text-slate-400">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            {{-- populate our post data --}}
                            @foreach ($articles as $article)
                                <tr>
                                    <td class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">{{ $article['title'] }}</td>
                                    <td class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">{{ $article->description }}</td>
                                    <td class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">{{ $article->created_at }}</td>
                                    <td class="p-4 pl-8 border-b border-slate-100 dark:border-slate-700 text-slate-500 dark:text-slate-400">
                                        {{-- <a href="{{ route('article.show', $article->id) }}" class="px-4 py-2 border border-blue-500 rounded-md hover:bg-blue-500 hover:text-white">SHOW</a> --}}
                                        <a href="{{ route('article.edit', $article->id) }}" class="px-4 py-2 border border-yellow-500 rounded-md hover:bg-yellow-500 hover:text-white ">EDIT</a>
                                        {{-- add delete button using form tag --}}
                                        <form method="post" action="{{ route('article.destroy', $article->id) }}" class="inline">
                                            @csrf
                                            @method('delete')
                                            <button class="px-4 py-2 border border-red-500 rounded-md hover:bg-red-500 hover:text-white ">DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
