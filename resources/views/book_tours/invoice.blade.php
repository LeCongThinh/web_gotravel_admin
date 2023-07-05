<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>
</head>
<body>
    <div class="invoice">
                                
        <div class="header">
            <h1 style="text-align: center;">HOA DON</h1>
        </div>
        <div class="content">
            <h3 style="margin-top: 30px;">Ma hoa don: {{ $bookTour->invoice_code }}</h3>
            <p>Ten khach hang: {{ removeVietnameseAccents($bookTour->user_name) }}</p>
            <p>SDT lien he: {{ $bookTour->phone }}</p>
            <p>Phuong thuc thanh toan: {{ $bookTour->payment }}</p>
            <p>Ngay lap hoa don: {{ $bookTour->created_at }}</p>
            <p>Nguoi lap hoa don: {{ removeVietnameseAccents(App\Models\User::find($bookTour->user_id)->name) }}</p>

            <table style="line-height: 2.5;border: 1px solid #4cc9f0;padding: 10px;width: 100%;border-collapse: collapse;
            margin-top: 20px;text-align: center;">
                <thead style="text-align: center;background-color: #a2d2ff;">
                    <tr >
                        <th style="border: 1px solid #4cc9f0;line-height: 2.5;">Ten tour</th>
                        <th style="border: 1px solid #4cc9f0;line-height: 2.5;">Ngay khoi hanh</th>
                        <th style="border: 1px solid #4cc9f0;line-height: 2.5;">So luong nguoi di</th>
                        <th style="border: 1px solid #4cc9f0;line-height: 2.5;">Don gia</th>
                        <th style="border: 1px solid #4cc9f0;line-height: 2.5;">Thanh tien</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td style="border: 1px solid #4cc9f0;line-height: 2.5;">{{ removeVietnameseAccents($bookTour->tour_name) }}</td>
                    <td style="border: 1px solid #4cc9f0;line-height: 2.5;">{{ $bookTour->departure_day }}</td>

                    <td style="border: 1px solid #4cc9f0;line-height: 2.5;">
                      <p style="margin-bottom: 10px;">Nguoi lon: {{ $bookTour->adult }} nguoi</p>
                      @if ($bookTour->child > 0)
                        <p style="margin-bottom: 10px;">Tre em: {{ $bookTour->child }} nguoi</p>
                      @endif
                    </td>
                    <td style="border: 1px solid #4cc9f0;line-height: 2.5;">{{ number_format($bookTour->price) }} VND</td>
                    <td style="border: 1px solid #4cc9f0;line-height: 2.5;">{{ number_format($bookTour->sum_price) }} VND</td>
                </tr>
                    
                </tbody>
                <tfoot style="font-weight: bold;">
                    <tr>
                        <td colspan="4" style="text-align: center; background-color: #a2d2ff">Tong cong:</td>
                        <td style="text-align: center;">{{ number_format($bookTour->sum_price) }} VND</td>
                      </tr>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="footer">
            <p style="font-size: 20px; text-align: center; margin-top: 30px; background-color: #e0fbfc ;">Cam on quy khach da su dung dich vu cua chung toi!</p>
        </div>
    </div>
    <?php
    function removeVietnameseAccents($str) {
        $accents = array(
            'á' => 'a', 'à' => 'a', 'ả' => 'a', 'ã' => 'a', 'ạ' => 'a',
            'ă' => 'a', 'ắ' => 'a', 'ằ' => 'a', 'ẳ' => 'a', 'ẵ' => 'a', 'ặ' => 'a',
            'â' => 'a', 'ấ' => 'a', 'ầ' => 'a', 'ẩ' => 'a', 'ẫ' => 'a', 'ậ' => 'a',
            'đ' => 'd',
            'é' => 'e', 'è' => 'e', 'ẻ' => 'e', 'ẽ' => 'e', 'ẹ' => 'e',
            'ê' => 'e', 'ế' => 'e', 'ề' => 'e', 'ể' => 'e', 'ễ' => 'e', 'ệ' => 'e',
            'í' => 'i', 'ì' => 'i', 'ỉ' => 'i', 'ĩ' => 'i', 'ị' => 'i',
            'ó' => 'o', 'ò' => 'o', 'ỏ' => 'o', 'õ' => 'o', 'ọ' => 'o',
            'ô' => 'o', 'ố' => 'o', 'ồ' => 'o', 'ổ' => 'o', 'ỗ' => 'o', 'ộ' => 'o',
            'ơ' => 'o', 'ớ' => 'o', 'ờ' => 'o', 'ở' => 'o', 'ỡ' => 'o', 'ợ' => 'o',
            'ú' => 'u', 'ù' => 'u', 'ủ' => 'u', 'ũ' => 'u', 'ụ' => 'u',
            'ư' => 'u', 'ứ' => 'u', 'ừ' => 'u', 'ử' => 'u', 'ữ' => 'u', 'ự' => 'u',
            'ý' => 'y', 'ỳ' => 'y', 'ỷ' => 'y', 'ỹ' => 'y', 'ỵ' => 'y',
            'Á' => 'A', 'À' => 'A', 'Ả' => 'A', 'Ã' => 'A', 'Ạ' => 'A',
            'Ă' => 'A', 'Ắ' => 'A', 'Ằ' => 'A', 'Ẳ' => 'A', 'Ẵ' => 'A', 'Ặ' => 'A',
            'Â' => 'A', 'Ấ' => 'A', 'Ầ' => 'A', 'Ẩ' => 'A', 'Ẫ' => 'A', 'Ậ' => 'A',
            'Đ' => 'D',
            'É' => 'E', 'È' => 'E', 'Ẻ' => 'E', 'Ẽ' => 'E', 'Ẹ' => 'E',
            'Ê' => 'E', 'Ế' => 'E', 'Ề' => 'E', 'Ể' => 'E', 'Ễ' => 'E', 'Ệ' => 'E',
            'Í' => 'I', 'Ì' => 'I', 'Ỉ' => 'I', 'Ĩ' => 'I', 'Ị' => 'I',
            'Ó' => 'O', 'Ò' => 'O', 'Ỏ' => 'O', 'Õ' => 'O', 'Ọ' => 'O',
            'Ô' => 'O', 'Ố' => 'O', 'Ồ' => 'O', 'Ổ' => 'O', 'Ỗ' => 'O', 'Ộ' => 'O',
            'Ơ' => 'O', 'Ớ' => 'O', 'Ờ' => 'O', 'Ở' => 'O', 'Ỡ' => 'O', 'Ợ' => 'O',
            'Ú' => 'U', 'Ù' => 'U', 'Ủ' => 'U', 'Ũ' => 'U', 'Ụ' => 'U',
            'Ư' => 'U', 'Ứ' => 'U', 'Ừ' => 'U', 'Ử' => 'U', 'Ữ' => 'U', 'Ự' => 'U',
            'Ý' => 'Y', 'Ỳ' => 'Y', 'Ỷ' => 'Y', 'Ỹ' => 'Y', 'Ỵ' => 'Y'
        );

        return strtr($str, $accents);
    }
    ?>
</body>
</html>
