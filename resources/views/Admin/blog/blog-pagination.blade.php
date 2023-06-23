<thead>
    <tr style="background-color: #0EA1E2">
        <th class="text-white">No</th>
        <th class="text-white">Tanggal</th>
        <th class="text-white">Judul</th>
        <th class="text-white">Author</th>
        <th class="text-white">Segmen</th>
        <th class="text-white">Action</th>
    </tr>
</thead>
<tbody>
    @if (count($data) == 0)
        <tr>
            <td colspan="6" class="text-center">Belum Ada Artikel !!</td>
        </tr>
    @else
        @foreach ($data as $i)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $i->tanggal }}</td>
                <td>{{ $i->judul }}</td>
                <td>{{ $i->users->username}}</td>
                <td>{{ $i->segmen->segmen }}</td>
                <td>
                    <a href="{{ route('blogs.show', $i->id) }}"
                        class="btn btn-sm btn text-white rounded-pill"
                        style="background-color: #0EA1E2">Detail</a>
                </td>
            </tr>
        @endforeach
    @endif
</tbody>