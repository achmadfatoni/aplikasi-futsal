<div class="row mt">
    <div class="col-md-6 col-md-offset-3 centered">
        <form class="form-inline">
            <div class="form-group">
                <select name="tanggal" class="form-control">
                    @for($no = 1; $no <= 31; $no++)
                        <option value="{{ $no }}" {{($no == $tanggal) ? 'selected' : null }}> {{ $no }}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <select name="bulan" class="form-control">
                    @foreach($bulans as $key => $value)
                        <option value="{{ $key }}" {{($key == $bulan) ?  'selected' : null}}> {{ $value }} </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="tahun" class="form-control">
                    @for($no = $tahun; $no <= ($tahun + 1); $no++)
                        <option value="{{ $no }}" {{($no == $tahun) ? 'selected' : null }}> {{ $no }}</option>
                    @endfor
                </select>
            </div>
            <div class="form-group">
                <button class="btn btn-primary cari">Cari</button>
            </div>

        </form>
    </div>
</div>
<div class="row mt">
    @foreach($lapangans as $lapangan)
        <div class="col-md-3 centered">
            <h1 class="form-control btn-primary">{{ $lapangan->nama }} | {{ Lang::get('jenis_lapangan.'.$lapangan->jenis_lapangan_id) }}</h1>
            @foreach($lapangan->jam as $jam)
                <?php
                $bookings = $jam->booking;
                ?>
                @if($bookings->count() > 0)
                    <?php $bookingCount = 0; ?>
                    @foreach($bookings as $booking)
                        <?php
                            if($booking->lapangan_id == $lapangan->id){
                                $bookingCount++;
                            }
                        ?>
                    @endforeach
                    @if($bookingCount > 0)
                            <button class="form-control btn btn-danger" disabled>Booked</button>
                    @else
                    {{--@if($booking->lapangan_id == $lapangan->id)--}}
                        {{--<button class="form-control btn btn-danger" disabled>Booked</button>--}}
                    {{--@else--}}
                        <button class="form-control btn btn-default booking" lapangan-id="{{ $lapangan->id }}" jam-id="{{ $jam->id }}">Jam : {{ $jam->nama }} | Harga : {{ $jam->pivot->harga }}</button>
                    @endif
                @else
                    <button class="form-control btn btn-default booking" lapangan-id="{{ $lapangan->id }}" jam-id="{{ $jam->id }}">Jam : {{ $jam->nama }} | Harga : {{ $jam->pivot->harga }}</button>
                @endif
            @endforeach
        </div>
    @endforeach
</div>
