@foreach ($comments as $comment)
    <div class="display-comment">
        <strong>{{ $comment->user->name }} - перезвонить: {{ $comment->recall }}</strong>
        <p>{{ $comment->results }}</p>
    </div>
@endforeach
