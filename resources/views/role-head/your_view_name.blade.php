<!-- Menampilkan data dari getKontribusiUser() -->
<h2>Data Kontribusi User</h2>
<table>
    <thead>
        <tr>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Nama Proker</th>
            <th>Nama File</th>
            <th>Status</th>
            <th>Nama User</th>
            <th>Kementrian User</th>
            <th>Nilai Kontribusi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataKontribusiUser as $data)
            <tr>
                <td>{{ $data->bulan }}</td>
                <td>{{ $data->tahun }}</td>
                <td>{{ $data->nama_proker }}</td>
                <td>{{ $data->nama_file }}</td>
                <td>{{ $data->status }}</td>
                <td>{{ $data->nama_user }}</td>
                <td>{{ $data->kementrian_user }}</td>
                <td>{{ $data->nilai_kontribusi }}</td>
            </tr>
        @endforeach
    </tbody>
</table>

<!-- Menampilkan data dari getProgressKementrian() -->
<h2>Data Progress Kementrian</h2>
<table>
    <thead>
        <tr>
            <th>Bulan</th>
            <th>Tahun</th>
            <th>Nama Kementrian</th>
            <th>Nama Proker</th>
            <th>Nama File</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @foreach($dataProgressKementrian as $data)
            <tr>
                <td>{{ $data->bulan }}</td>
                <td>{{ $data->tahun }}</td>
                <td>{{ $data->nama_kementrian }}</td>
                <td>{{ $data->nama_proker }}</td>
                <td>{{ $data->nama_file }}</td>
                <td>{{ $data->status }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
