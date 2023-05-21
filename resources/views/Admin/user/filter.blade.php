
        <tbody id="userTableBody">
            @if (!empty($filteredUsers))
                @if ($filteredUsers->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center">Belum Ada User !!</td>
                    </tr>
                @else
                    @foreach ($filteredUsers as $user)
                        <tr>
                            <td scope="row">{{ $loop->iteration }}</td>
                            <td>{{ $user->username }}</td>
                            <td>{{ $user->role->role }}</td>
                            <td>
                                <a href="{{ route('user.show', $user->id) }}" class="btn btn-sm btn text-white rounded-pill" style="background-color: #0EA1E2">Detail</a>
                               </td>
                        </tr>
                    @endforeach
                @endif
            @else
                <tr>
                    <td colspan="4" class="text-center">Tidak ada hasil yang cocok.</td>
                </tr>
            @endif
        </tbody>