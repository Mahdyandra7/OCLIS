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


<div class="row">
    <div class="col-lg-12">
        <select class="form-select" id="monthSelect" name="monthSelect" aria-label="Default select example" onchange="selectMonth(this.value)">
            <option selected disabled value>Select Month</option>
            <option value="0">All</option>
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>
    </div>

    <script>
        function selectMonth(value) {
            // Redirect to the course-list route with the selected value as a query parameter
            window.location.href = '/show-data?monthSelect=' + value;
        }
    </script>
</div>

<p>{{ json_encode($UsercountList) }}</p>