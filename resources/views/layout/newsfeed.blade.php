<div id="newsfeed">
    <div class="row">
        <div class="col-2"></div>
        <div class="col-6">
            <table width="100%" border="1">
                <tr>
                    <th>ID</th>
                    <th>Media</th>
                    <th>Caption</th>
                    <th>Owner</th>
                    <th>Like</th>
                </tr>
                @foreach($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td>
                            <img src="{{ $post->media }}" alt="" height="160px">
                        </td>
                        <td>{{ $post->caption }}</td>
                        <td>{{ $post->owner->username }}</td>
                        <td>
                            {{ $post->like_count }}
                        </td>
                        @php
                            if ($count == 9) {
                                break;
                            }
                            $count++;
                        @endphp
                    </tr>
                @endforeach
            </table>
        </div>
        <div class="col"></div>
    </div>
</div>
