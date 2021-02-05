
@foreach ($comments as $comment)
<td>
    {{ $comment->results }}
</td>
<td>
    {{ $comment->flag }}
</td>
<td>
    {{ $comment->recall }}
</td>
@endforeach