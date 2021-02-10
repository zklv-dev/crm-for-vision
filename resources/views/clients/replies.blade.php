@foreach ($comments as $comment)
    @if ($comment->results !== 'Не заполнено')
        <div class="display-comment">
            <strong>{{ $comment->user->name }} @if ($comment->recall !== null) -
                    перезвонить: {{ $comment->recall }}
                @endif</strong>
            <p>{{ $comment->results }}</p>
        </div>
    @endif
@endforeach
