<x-layout>

    <div class="card mb-4">

        <a href="{{ route('dashboard') }}" class="block mb-2 text-xs text-blue-500">&larr; Go back to your Dashboard</a>

        <h2 class="font-bold mb-4">Update your post</h2>

        {{-- Session Messages --}}
        @if (session('success'))
            <x-flashMsg msg="{{ session('success') }}" />
        @elseif (session('delete'))
            <x-flashMsg msg="{{ session('delete') }}" bg="bg-red-500" />
        @endif

        <form action="{{ route('posts.update', $post) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Post Title --}}
            <div class="mb-4">
                <label for="title">Post Title</label>
                <input type="text" name="title" value="{{ $post->title }}"
                    class="input
                            @error('title') ring-red-500 @enderror">

                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Post Body --}}
            <div class="mb-4">
                <label for="body">Post Body</label>
                <textarea name="body" rows="5" class="input
                    @error('body') ring-red-500 @enderror">{{ $post->body }}</textarea>

                @error('body')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Current photo if it exists --}}
            @if ($post->image)
                <div class="h-64 rounded-md mb-4 w-1/4 object-cover overflow-hidden">
                    <label for="">Current cover photo</label>
                    <img src="{{ asset('storage/' . $post->image) }}" alt="">
                </div>
            @endif

            {{-- Post Image --}}
            <div class="mb-4">
                <label for="image">Cover photo</label>
                <input type="file" name="image" id="image">

                @error('image')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            {{-- Submit button --}}
            <button class="btn">Update</button>

        </form>
    </div>
</x-layout>
