<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather Update</title>
</head>

<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #4B515D;">

    <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center" width="100%" style="max-width: 600px; margin: auto;">
        <tr>
            <td style="padding: 40px 20px; text-align: center;">
                <h2 style="color: white; margin-bottom: 20px;">Weather Update</h2>
                <div style="text-align: left;">
                    <p style="font-size: 18px; color: white; margin-bottom: 20px;text-align:center;">City: {{ $data['city'] }}</p>
                    @php
                        use Carbon\Carbon;
                        $carbon = Carbon::now()->setTimezone('Asia/Tashkent');
                    @endphp
                    <p style="font-size: 18px; text-align:center; color: white; margin-bottom: 20px;">Time: {{ $carbon->format('H:i') }}</p>
                    <p style="font-size: 24px;text-align:center; color: white; font-weight: bold;">Temperature: {{ $data['temp'] }}°C</p>
                </div>
                <img src="https://cdn2.iconfinder.com/data/icons/weather-flat-14/64/weather03-1024.png" width="100" alt="Weather Icon" style="margin-top: 20px;">
            </td>
        </tr>
    </table>

</body>

</html>
