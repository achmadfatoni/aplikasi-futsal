
<table id='list' class="table table-bordered table-striped">
    <thead>
    <tr>
        <th class="text-center">No</th>
        <th class="text-center">Nama Customer</th>
        <th class="text-center">Tanggal</th>
        <th class="text-center">Lapangan</th>
        <th class="text-center">Jam</th>
        <th class="text-center">Harga</th>
    </tr>
    </thead>
    <tbody>
    <?php $no = 1; ?>
    <?php $total = 0; ?>
    @foreach($list as $data)
        <tr>
            <td class="text-center">{{ $no }}</td>
            <td class="text-center">{{ $data->customer->nama }}</td>
            <td class="text-center">{{ $data->tanggal }}</td>
            <td class="text-center">{{ $data->lapangan->nama }}</td>
            <td class="text-center">{{ $data->jam->nama }}</td>
            <td class="text-center">
                @foreach($data->lapangan->jam as $jam)
                    @if($data->jam_id == $jam->id)
                        {{ $jam->pivot->harga }}
                        <?php $total += $jam->pivot->harga; ?>
                    @endif
                @endforeach
            </td>
        </tr>
        <?php $no++; ?>
    @endforeach
    <tr>
        <td class="text-center" colspan="5">TOTAL</td>
        <td>{{ $total }}</td>
    </tr>
    </tbody>
    <tfoot>
</table>