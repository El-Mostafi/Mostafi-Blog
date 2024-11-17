<div>
    <div class="flex">
        <div class="w-50 flex ml-20  items-center">
                <label for="search">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                </svg>
                </label>
                <input wire:model="search" name="search" id="search" type="text" placeholder="Search..."
                    class="form-control w-50 bg-gray-100 ml-2 rounded px-4 py-2 hover:bg-gray-100" />
        </div> 
        <div class=" w-50 flex ">
            <a href="@if (auth()->check()){{ route('posts.create') }}@else {{ route('login') }} @endif" class="btn btn-success">Create Post</a>
        </div>
    </div>
<table class="table table-striped mt-4 text-center mx-auto">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Posted By</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row">{{ $post->id }}</th>
            <td class=" font-semibold">{{ $post->title }}</td>
            <td>{{ $post->user->name }}</td>
            <td>{{ $post->created_at->toDayDateTimeString() }}</td>
            <td>
                <!-- View -->
                <a wire:navigate href="{{ route('posts.show', $post->id) }}" class="icon-link icon-link-hover text-sm text-blue-600 font-semibold rounded hover:text-teal-800 mr-1 mt-1 ">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                </svg>
                </a>
                @if(auth()->check())
                @if(auth()->user()->id == $post->user_id)
                <!-- Edite -->
                <a wire:navigate href="{{ route('posts.edite', $post->id) }}" class="icon-link icon-link-hover text-sm text-green-600 font-semibold rounded hover:text-teal-800 mr-1 mt-1 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                </a>
                <!-- Delet -->
                <form style="display: inline;" wire:submit.prevent="destroy({{$post->id}})" onsubmit="return confirm('Are you sure you want to delete this post?')">
                    @csrf
                    <button type="submit" class="text-sm text-red-500 font-semibold rounded hover:text-teal-800 mr-1 mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                    </button>
                </form>
                @endif
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
<div class="w-25 mx-auto"><span>{{$posts->links()}}</span></div>
</div>
