<?php

namespace App\Http\Controllers;

use App\Models\BookTour;
use App\Http\Requests\StoreBookTourRequest;
use App\Http\Requests\UpdateBookTourRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;
use Illuminate\Support\Str;
// use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\View;
use PDF;

class BookTourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bk = BookTour::all();
        return view('book_tours.booktour-index',  compact('bk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //Dùng Query String để load dữ liệu qua lại 2 trang 
        $tourName = request()->input('tourName');
        $tourId = request()->input('tourId');
        $departureDay = request()->input('departureDay');
        $price = request()->input('price');



        return view('book_tours.booktour-create', ['tourName' => $tourName, 'tourId' => $tourId, 'departureDay' => $departureDay, 'price'=>$price]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tourPrice = $request->input('price');
        $quantityAdult = $request->input('adult');
        $quantityChild = $request->input('child');
        $sumPrice = ($tourPrice * $quantityAdult) + ($tourPrice * 0.5 * $quantityChild);
    
        $bookTour = new BookTour();
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = strtoupper(Str::random(10, $characters));
        $bookTour->tour_name = $request->input('tour_name');
        $bookTour->departure_day = $request->input('departure_day');
        $bookTour->price = $tourPrice;
        $bookTour->user_name = $request->input('user_name');
        $bookTour->phone = $request->input('phone');
        $bookTour->email = $request->input('email');
        $bookTour->adult = $quantityAdult;
        $bookTour->child = $quantityChild;
        $bookTour->sum_price = $sumPrice;
        $bookTour->payment = $request->input('payment_method');
        $bookTour->user_id = Auth::id();
        $bookTour->tour_id = $request->input('tour_id');
        $bookTour->invoice_code = 'HD-' . $randomString;
        $bookTour->save();
    
        // Nếu thanh toán "Stripe"
        if ($request->input('payment_method') === 'Stripe') {
            \Stripe\Stripe::setApiKey(config('stripe.sk'));
    
            // Tạo phiên thanh toán Stripe
            $session = \Stripe\Checkout\Session::create([
                // 'payment_method_types' => ['card'],
                'line_items' => [
                    [
                        'price_data' => [
                            'currency' => 'VND',
                            'product_data' => [
                                'name' => 'Thanh toán tour',
                            ],
                            'unit_amount' => ($tourPrice * $quantityAdult) + ($tourPrice * 0.5 * $quantityChild), // Đổi sang đơn vị là cents (1 USD = 100 cents)
                        ],
                        'quantity' => 1,
                    ],
                ],
                'mode' => 'payment',
                'success_url' => route('book-tour.index'),
                'cancel_url' => route('book-tour.index'),
            ]);
            $bookTour->save();
    
            return redirect()->away($session->url);
        }

        //thanh toán bằng vnpay
        else if ($request->input('payment_method') === 'Vnpay') {
    
            return redirect()->route('vnpay.vnpay_payment', ['amount' => ($tourPrice * $quantityAdult) + ($tourPrice * 0.5 * $quantityChild)]);

        }
        // Nếu phương thức thanh toán khác Stripe, lưu bookTour và chuyển hướng đến trang danh sách bookTour
        return redirect()->route('book-tour.index');
    }
    

    public function success()
    {
        return "Yay, It works!!!";
    }

    public function vnpay_payment(Request $request)
    {
        $amount = $request->input('amount');
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/book-tour";
        $vnp_TmnCode = "O6U9H7HB";//Mã website tại VNPAY 
        $vnp_HashSecret = "IDOQBNSLIWOSYIDCRIRKKFMKMSZCJWHF"; //Chuỗi bí mật

        $vnp_TxnRef = time() . '_' . uniqid(); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
        $vnp_OrderInfo = 'Thanh toán hóa đơn bằng vnpay';
        $vnp_OrderType = 'payment';
        $vnp_Amount = $amount * 100;
        $vnp_Locale = 'VN';
        $vnp_BankCode = 'NCB';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        
        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_OrderInfo,
            "vnp_OrderType" => $vnp_OrderType,
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }
        if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
            $inputData['vnp_Bill_State'] = $vnp_Bill_State;
        }

        //var_dump($inputData);
        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        $returnData = array('code' => '00'
            , 'message' => 'success'
            , 'data' => $vnp_Url);
            if (isset($_POST['redirect'])) {
                header('Location: ' . $vnp_Url);
                exit(); // Sử dụng exit() thay vì die()
            } else {
                echo '<!DOCTYPE html>
                    <html>
                    <head>
                        <meta http-equiv="refresh" content="0;url=' . $vnp_Url . '">
                    </head>
                    <body>
                        Đang chuyển hướng...
                        <script>window.location.href = "' . $vnp_Url . '";</script>
                    </body>
                    </html>';
                exit(); // Thêm exit() ở đây
            }
            
    }
    


    /**
     * Display the specified resource.
     */
    public function show(BookTour $bookTour)
    {
        return view('book_tours.booktour-show', compact('bookTour'));
    }

    public function download_invoice(BookTour $bookTour)
    {
        $data = [
            'bookTour' => $bookTour,
        ];
    
        $pdf = PDF::loadView('book_tours.invoice', $data);
    
        return $pdf->download('hoadon.pdf');
    }
    
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BookTour $bookTour)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookTourRequest $request, BookTour $bookTour)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BookTour $bookTour)
    {
        //
    }
}
