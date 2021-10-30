<!DOCTYPE HTML
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional //EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <!--[if gte mso 9]>
<xml>
  <o:OfficeDocumentSettings>
    <o:AllowPNG/>
    <o:PixelsPerInch>96</o:PixelsPerInch>
  </o:OfficeDocumentSettings>
</xml>
<![endif]-->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="x-apple-disable-message-reformatting">
    <!--[if !mso]><!-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--<![endif]-->
    <title></title>
</head>

<body style="margin: 0;padding: 0;-webkit-text-size-adjust: 100%;background-color: #FFFFFF;color: #000000">
    <div bgcolor="#FFFFFF"
        style="font-family:'Helvetica Neue','Helvetica',Helvetica,Arial,sans-serif;width:100%!important;height:auto;font-size:14px;color:#404040;margin:0;padding:0">
        <table
            style="max-width:100%;border-collapse:collapse;border-spacing:0;width:100%;background-color:transparent;margin:0;padding:0"
            bgcolor="transparent">
            <tbody>
                <tr style="margin:0;padding:0">
                    <td style="margin:0;padding:0"></td>
                    <td style="width:600px!important;clear:both!important;margin:0 auto;padding:0" bgcolor="#FFFFFF">
                        <div
                            style="display:block;border-collapse:collapse;margin:0 auto;border:1px solid #e7e7e7;background:#f4f4f4">
                            <!--Header-->
                            <table
                                style="max-width:100%;border-spacing:0;width:100%;background-color:#ffffff;margin:0;padding:20px"
                                bgcolor="transparent">
                                <tbody>
                                    <tr style="margin:0;padding:0">
                                        <td style="text-align: center;">
                                            <img src="https://cloud-ex42.usaupload.com/file/5aMz/logo.svg" alt=""
                                                height="60" style="margin-bottom:10px">
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--Header-->
                            <!--Indo-->
                            <div style="padding:15px">
                                <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
                                    style="border:1px solid #dddddd">
                                    <tbody>
                                        <tr>
                                            <td style="padding:20px">
                                                <table style="width: 100%; background: #e1f6ef; border-radius: 10px;">
                                                    <tbody>
                                                        <tr>
                                                            <td align="left"
                                                                style="font-size:0px;padding:10px 25px;word-break:break-word">
                                                                <table cellpadding="0" cellspacing="0" width="100%"
                                                                    border="0"
                                                                    style="color:#333333;font-family:Inter,Arial;font-size:16px;line-height:22px;table-layout:auto;width:100%;border:none">
                                                                    <tbody>
                                                                        <tr style="border-bottom:1px solid #ecedee">
                                                                            <td
                                                                                style="text-align:left;padding:8px 0; color: #fa9200;">
                                                                                No. Invoice</td>
                                                                            <td
                                                                                style="text-align:right;padding:8px 0 8px 8px;  color: #fa9200;">
                                                                                {{ $transaction->transaction_code }}
                                                                            </td>
                                                                        </tr>
                                                                        <tr style="border-bottom:1px solid #ecedee">
                                                                            <td style="text-align:left;padding:8px 0">
                                                                                Tanggal Pemesanan</td>
                                                                            <td
                                                                                style="text-align:right;padding:8px 0 8px 8px">
                                                                                {{ date('d F Y', strtotime($transaction->created_at)) }}
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                                    style="vertical-align:top" width="100%">
                                                    <tbody>
                                                        <tr>
                                                            <td align="left"
                                                                style="font-size:0px;padding:10px 25px;word-break:break-word">
                                                                <div
                                                                    style="font-family:Inter,Arial;font-size:16px;line-height:1.5;text-align:left;color:#333333">
                                                                    Rincian Pesanan</div>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="left"
                                                                style="font-size:0px;padding:10px 25px;word-break:break-word">
                                                                <table cellpadding="0" cellspacing="0" width="100%"
                                                                    border="0"
                                                                    style="color:#333333;font-family:Inter,Arial;font-size:16px;line-height:22px;table-layout:auto;width:100%;border:none">
                                                                    <tbody>
                                                                        <tr style="border-bottom:1px solid #ecedee">
                                                                            <th style="text-align:left;padding:8px 0">
                                                                                Tanggal</th>
                                                                            <th style="text-align:left;padding:8px 0">
                                                                                Nama Interpreter</th>
                                                                            <th style="text-align:left;padding:8px 0">
                                                                                Lokasi</th>
                                                                            <th
                                                                                style="text-align:right;padding:8px 0 8px 8px">
                                                                                Harga</th>
                                                                        </tr>
                                                                        <tr style="border-bottom:1px solid #ecedee">
                                                                            <td style="text-align:left;padding:8px 0">
                                                                                {{ date('d F Y', strtotime($transaction->details[0]->schedule->date)) }}
                                                                                <br>{{ $transaction->details[0]->schedule->time_start }}
                                                                                -
                                                                                {{ $transaction->details[0]->schedule->time_end }}
                                                                                WIB
                                                                            </td>
                                                                            <td style="text-align:left;padding:8px 0">
                                                                                {{ $transaction->details[0]->schedule->user->name }}
                                                                            </td>
                                                                            <td style="text-align:left;padding:8px 0">
                                                                                {{ $transaction->details[0]->schedule->user->detail->province }}</td>
                                                                            <td
                                                                                style="text-align:right;padding:8px 0 8px 8px">
                                                                                Rp&nbsp;{{ $transaction->total_paid ?? 0 }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td align="right"
                                                                style="font-size:0px;padding:10px 25px;word-break:break-word">
                                                                <table cellpadding="0" cellspacing="0" width="100%"
                                                                    border="0"
                                                                    style="color:#333333;font-family:Inter,Arial;font-size:16px;line-height:22px;table-layout:auto;width:100%;border:none">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th style="text-align:left;padding:8px 0">
                                                                                Total Harga</th>
                                                                            <td
                                                                                style="text-align:right;padding:8px 0 8px 8px">
                                                                                Rp&nbsp;{{ $transaction->total_paid ?? 0 }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th style="text-align:left;padding:8px 0">
                                                                                Diskon</th>
                                                                            <td
                                                                                style="text-align:right;padding:8px 0 8px 8px">
                                                                                Rp&nbsp;0</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th style="text-align:left;padding:8px 0">
                                                                                Total Pembayaran</th>
                                                                            <td
                                                                                style="text-align:right;padding:8px 0 8px 8px;color:#ce231c">
                                                                                Rp&nbsp;{{ $transaction->total_paid ?? 0 }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!--Indo-->
                            <!--Footer-->
                            <table align="center" width="100%" bgcolor="#5cbea0">
                                <tbody>
                                    <tr style="margin:0;padding:0 0 0 0">
                                        <td
                                            style="display:block!important;width:600px!important;clear:both!important;margin:0 auto;padding:0">
                                            <table width="100%" align="center" border="0" cellspacing="0"
                                                cellpadding="0" bgcolor="#5cbea0">
                                                <tbody>
                                                    <tr>
                                                        <td height="15"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <table style="width: 100%;">
                                                                <tbody>
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left; padding: 0 15px; color: #FFFFFF;">
                                                                            Download Aplikasi Signteraktif
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right; padding: 0 15px; color: #FFFFFF;">
                                                                            Ikuti Kami
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td
                                                                            style="text-align: left; padding: 15px; color: #FFFFFF;">
                                                                            <a href=""
                                                                                style="color: #FFFFFF; text-decoration: none; padding: 0 3px;">
                                                                                <img src="https://cloud-ex42.usaupload.com/file/5aMx/appstore.jpg"
                                                                                    alt="">
                                                                            </a>
                                                                            <a href=""
                                                                                style="color: #FFFFFF; text-decoration: none; padding: 0 3px;">
                                                                                <img src="https://cloud-ex42.usaupload.com/file/5aMw/playstore.jpg"
                                                                                    alt="">
                                                                            </a>
                                                                        </td>
                                                                        <td
                                                                            style="text-align: right; padding: 15px; color: #FFFFFF;">
                                                                            <a href="#"
                                                                                style="color: #FFFFFF; text-decoration: none; padding: 0 3px;">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="32" height="32"
                                                                                    fill="currentColor"
                                                                                    class="bi bi-facebook"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path
                                                                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
                                                                                </svg>
                                                                            </a>
                                                                            <a href="#"
                                                                                style="color: #FFFFFF; text-decoration: none; padding: 0 3px;">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="32" height="32"
                                                                                    fill="currentColor"
                                                                                    class="bi bi-twitter"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path
                                                                                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z" />
                                                                                </svg>
                                                                            </a>
                                                                            <a href="#"
                                                                                style="color: #FFFFFF; text-decoration: none; padding: 0 3px;">
                                                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                                                    width="32" height="32"
                                                                                    fill="currentColor"
                                                                                    class="bi bi-instagram"
                                                                                    viewBox="0 0 16 16">
                                                                                    <path
                                                                                        d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
                                                                                </svg>
                                                                            </a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td
                                                            style="text-align: center; padding: 15px; color: #FFFFFF; border-top: 1px solid #FFFFFF;">
                                                            <span>Copyright 2021 © PT Signteraktif</span>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <!--Footer-->
                        </div>
                    </td>
                    <td style="margin:0;padding:0"></td>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
