@foreach ($comments as $comment)
    @if ($comment->results !== 'Не заполнено')
        <div class="display-comment">
            <strong>{{ $comment->user->name }} - перезвонить: {{ $comment->recall }}</strong>
            <p>{{ $comment->results }}</p>
        </div>
    @endif
@endforeach
