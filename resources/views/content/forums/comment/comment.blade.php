@foreach ($comments as $comment)

<div class="ml-12">
    <div class="container my-2">
        <div class="flex mb-3">
            <x-label>{{ $comment->user->name }}</x-label>
        </div>
        <p class="mx-2 px-2">{!! nl2br($comment->comment) !!}</p>
    </div>
    @auth
        <div class="container">
            <form action="{{ route('reply') }}" method="POST">
                @csrf
                <input type="hidden" name="forum_id" value="{{ $forum_id }}">
                <input type="hidden" name="comment_id" value="{{ $comment->id }}">
                <input type="text" name="comment" placeholder="Reply to {{ $comment->user->name }}" class="w-5/6" id="comment" required>
                <button type="submit" class="px-2 py-2 bg-blue-500 hover:bg-blue-400 rounded text-white">Reply</button>
            </form>
        </div>
    @endauth
    <div class="container ml-14">
        @include('content.forums.comment.comment', ['comments'=>$comment->replies])
    </div>
</div>
@endforeach
