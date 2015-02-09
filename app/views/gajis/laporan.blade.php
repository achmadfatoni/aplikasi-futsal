<?php $total = 0; ?>
<table id="list" class="table table-bordered table-striped">
    <thead>
    <tr>
        <td class="text-center">No</td>
        <td class="text-center">Nama Karyawan</td>
        <td class="text-center">Nominal</td>
    </tr>
    </thead>
    <tbody>
    <?php $no = 1; ?>
    @foreach($list as $data)
        <tr>
            <td>{{ $no }}</td>
            <td>{{ $data->karyawan->nama }}</td>
            <td>{{ $data->nominal }}</td>
        </tr>
        <?php $no++; ?>
        <?php $total += $data->nominal; ?>
    @endforeach
        <tr>
            <td>Total</td>
            <td colspan="2">{{ $total }}</td>
        </tr>
    </tbody>
</table>
