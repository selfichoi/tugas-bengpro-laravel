<div style="padding: 20px; font-family: sans-serif;">
    <h2>daftar poli poliklinik aya</h2>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>no</th>
                <th>nama poli</th>
                <th>keterangan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($polis as $p)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $p->nama_poli }}</td>
                <td>{{ $p->keterangan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>