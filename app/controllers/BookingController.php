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
        $this->beforeFilter('auth', array('except' => array('getIndex')));
        $this->beforeFilter('admin', array('only' => array('getAdmin')));
//        $this->beforeFilter('auth', array('only' => array('customer', 'admin')));
    }

    public function getIndex()
    {
        if (Auth::check()) {
            $role = Auth::user()->role_id;
            if ($role == USER_GOLD || $role == USER_SILVER) {
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
            ->with(array('jam' => function ($q) use ($tahun, $bulan, $tanggal){
                $q->with(array('booking' => function($q) use ($tahun, $bulan, $tanggal){
                    $q->where('tanggal','=', $tahun.'-'.$bulan.'-'.$tanggal);

                }));
            }))
            ->get();
//        return $lapangans;
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
            ->with(array('lapangan' => function($q){
                $q->with('jam');
            }))
            ->where('status','!=',BOOKING_VALIDATED)
            ->orderBy('created_at','desc')
            ->get();
//        return $list;
        $data = array(
            'list' => $list,
        );
        return View::make('booking.admin', $data);
    }

    public function postSave()
    {
        $query = Booking::whereCustomerId(Auth::user()->user_identity)
                            ->where('status','!=', BOOKING_VALIDATED)
                            ->count();
        if($query >= 2) {
            $data = array(
                'message' => 'failed',
            );
        }else{
            $bookings = json_decode(Input::get('data'));
            DB::transaction(function () use ($bookings) {
                foreach ($bookings as $booking) {
                    Booking::create(array(
                        'customer_id' => Auth::user()->user_identity,
                        'lapangan_id' => $booking->lapangan_id,
                        'jam_id' => $booking->jam_id,
                        'tanggal' => $booking->tanggal,
                        'status' => BOOKING_PENDING,
                        'no_kwitansi' => \Carbon\Carbon::now()->timestamp
                    ));
                }
            });
            $data = array(
                'message' => 'success',
            );
        }
        return $data;
    }

    public function getDelete($id)
    {
        $booking = $this->booking->find($id);
        $booking->update(array(
            'status' => BOOKING_CANCELED
        ));
        if ($booking->delete()) {
            return Redirect::back()->with('success', 'Booking berhasil dihapus');
        } else {
            return Redirect::back()->with('error', 'Booking Gagal dihapus');
        }
    }

    public function getValidate($id)
    {
        $booking = $this->booking->find($id);
        $update = $booking->update(array(
            'status' => BOOKING_VALIDATED
        ));
        if ($update) {
            return Redirect::back()->with('success', 'Booking berhasil divalidasi');
        } else {
            return Redirect::back()->with('error', 'Booking Gagal divalidasi');
        }
    }

    public function getKwitansi(){
                $customerId = Auth::user()->user_identity;
                $lastBook = Booking::whereCustomerId($customerId)
                    ->orderBy('no_kwitansi','desc')
                    ->first();

                $noKwitansi = $lastBook->no_kwitansi;

                $booking = Booking::with(array('jam','lapangan','customer'))
                    ->orderBy('jam_id')
                    ->whereNoKwitansi($noKwitansi)
                    ->get();
                $data = [
                    'booking'   => $booking
                ];
                $pdf = PDF::loadView('booking.kwitansi', $data);

                return $pdf->download('kwitansi.pdf');
    }

}