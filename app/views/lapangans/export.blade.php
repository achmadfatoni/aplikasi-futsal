
<table id='list' class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">Nama Customer</th>
        <th class="text-center">Tanggal</th>
        <th class="text-center">Lapangan</th>
        <th class="text-center">Jam</th>
    </tr>
    </thead>
    <tbody>
    <?php $no = 1; ?>
    @foreach($list as $data)
        <tr>
            <td class="text-center">{{ $no }}</td>
            <td class="text-center">{{ $data->customer->nama }}</td>
            <td class="text-center">{{ $data->tanggal }}</td>
            <td class="text-center">{{ $data->lapangan->nama }}</td>
            <td class="text-center">{{ $data->jam->nama }}</td>
        </tr>
        <?php $no++; ?>
    @endforeach
    </tbody>
    <tfoot>
</table>