<?php

class BookingController extends BaseController
{

    private $lapangan;
    private $jam;
    private $booking;

    public function __construct(Lapangan $lapangan, Jam $jam, Booking $booking)
    {
        $this->lapangan = $lapangan;
        $this->jam = $jam;
        $this->booking = $booking;
    }

    public function getIndex()
    {
        if (Auth::check()) {
            $role = Auth::user()->role_id;
            if ($role == USER_GOLD) {
                return Redirect::to('booking/customer');
            } elseif ($role = USER_ADMINISTRATOR) {
                return Redirect::to('booking/admin');
            }
        }

        return $this->guest();
    }

    public function guest()
    {
        $data = array(
            'actionLogin' => URL::to('login/sign-in'),
        );
        return View::make('booking.guest', $data);
    }

    public function getCustomer($tahun = null, $bulan = null, $tanggal = null)
    {
        $dt = \Carbon\Carbon::now();
        if ($tahun == null) {
            $tahun = $dt->year;
        }

        if ($bulan == null) {
            $bulan = $dt->month;
        }

        if ($tanggal == null) {
            $tanggal = $dt->day;
        }

        $lapangans = $this->lapangan
            ->with('jam')
            ->get();
        $data = array(
            'tahun' => $tahun,
            'bulan' => $bulan,
            'tanggal' => $tanggal,
            'bulans' => Lang::get('bulan'),
            'lapangans' => $lapangans
        );
        return View::make('booking.customer', $data);
    }

    public function getAdmin()
    {
        $list = $this->booking
            ->with('customer')
            ->with('lapangan')
            ->with('jam')
            ->get();
        $data = array(
            'list' => $list,
        );
        return View::make('booking.admin', $data);
    }

    public function postSave()
    {
        $bookings = json_decode(Input::get('data'));
        DB::transaction(function () use ($bookings) {
            foreach ($bookings as $booking) {
                Booking::create(array(
                    'customer_id' => Auth::user()->user_identity,
                    'lapangan_id' => $booking->lapangan_id,
                    'jam_id' => $booking->jam_id,
                    'tanggal' => $booking->tanggal,
                ));
            }
        });

        $data = array(
            'message' => 'success',
        );

        return $data;
    }

    public function getDelete($id)
    {
        $booking = $this->booking->find($id);
        if ($booking->delete()) {
            return Redirect::back()->with('success', 'Booking berhasil dihapus');
        } else {
            return Redirect::back()->with('error', 'Customer Gagal dihapus');
        }
    }

}