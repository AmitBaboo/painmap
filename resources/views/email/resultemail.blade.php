<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>

<body style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #f5f8fa; color: #74787E; height: 100%; hyphens: auto; line-height: 1.4; margin: 0; -moz-hyphens: auto; -ms-word-break: break-all; width: 100% !important; -webkit-hyphens: auto; -webkit-text-size-adjust: none; word-break: break-word;">
    <style>
        @media only screen and (max-width: 600px) {
            .inner-body {
                width: 100% !important;
            }

            .footer {
                width: 100% !important;
            }
        }

        @media only screen and (max-width: 500px) {
            .button {
                width: 100% !important;
            }
        }
    </style>

    <table class="wrapper" width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #f5f8fa; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
        <tr>
            <td align="center">
                <table class="content" width="100%" cellpadding="0" cellspacing="0" role="presentation">
                    <!-- Email Body -->
                    <tr>
                        <td class="body" width="100%" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #FFFFFF; border-bottom: 1px solid #EDEFF2; border-top: 1px solid #EDEFF2; margin: 0; padding: 0; width: 100%; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 100%;">
                            <table class="inner-body" align="center" width="600" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; background-color: #FFFFFF; margin: 0 auto; padding: 0; width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px;">
                                <!-- Body content -->
                                <tr>
                                    <td class="content-cell" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; padding: 35px;">
                                        @yield('content')
                                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Dear {{ $details->full_name ?? '' }},</p>
                                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: justify;">We're sorry that you’re in pain, but very glad that you’ve found Pain Map. Here’s a copy of your road map to pain relief that we’re created for you. You’ll find your likely diagnosis, advice and exercises, product suggestions and the Therapist we recommended below. And, if you want more help now, then you can book your appointment for an online consultation with an experienced Physio now too.</p>
                                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: justify;">We’ll be in touch a few times to see how you’re getting on, but if your pain isn’t improving, or you’d like to speed things up, we would urge you to get in touch with your recommended Therapist or book and online session. We only work with great Therapists, so we’re confident they will be able to help you.</p>
                                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: justify;">For now, good luck and we hope you are feeling better soon.</p>
                                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">The Pain Map Team</p>
                                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Diagnosis</p>
                                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">{{ $details->diagnosis ?? '' }}</p>
                                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Advice and Exercises</p>
                                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;"><a href="{{ $details->video ?? '' }}">Click here to watch the video with all our advice and recommendations on how to relieve your pain quickly.</a></p>

                                        @if(count($details->products ?? '') > 0)
                                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Recommended Products</p>
                                        <table>
                                            @foreach($details->products ?? '' as $product)
                                            <tr>
                                                <td width='50%'>
                                                    <a href="{{ $product->file_caption ?? '' }}">
                                                        <img width='100%' src="{{ $product->file_path ?? '' }}" alt="Product Image" style='border-radius:10px'>
                                                    </a>
                                                </td>
                                                <td style='margin-left:50px'>
                                                    <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">{{ $product->title ?? '' }}</p>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </table>
                                        @endif

                                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Recommended Therapist</p>
                                        <table>
                                            @if($details->therapist !== null)
                                            <tr>
                                                <td width="50%">
                                                    <img width="70%" src="{{ $details->therapist->profile_photo_path ?? '' }}" alt="User profile picture" style="border-radius:50%;">
                                                </td>
                                                <td>
                                                    <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">{{ $details->therapist->full_name ?? '' }}</p>
                                                    <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;"><a href="tel:{{ $details->therapist->contact_number ?? '#' }}">Call at {{ $details->therapist->contact_number ?? '' }}</a> </p>
                                                    <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;"> {{ $details->therapist->email ?? '' }}</p>
                                                    <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;"><a href="{{ $details->therapist->website ?? '#' }}">{{ $details->therapist->website ?? '' }}</a></p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: justify;">{{ $details->therapist->company_bio ?? '' }}</p>
                                                </td>
                                            </tr>
                                            @else
                                            <tr>
                                                <td colspan="2">
                                                    <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: justify;">{{ __("Unfortunately, we don't have a Therapist that we would recommend in your area yet.  For now, we'd recommend making a start with the exercises, and products and you can book an online consultation below.  We are looking for someone brilliant in your area and will be in touch as soon as we find someone") }}</p>
                                                </td>
                                            </tr>
                                            @endif
                                        </table>

                                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: left;">Appointment</p>
                                        <table>
                                            <tr>
                                                <td>
                                                    <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; color: #74787E; font-size: 16px; line-height: 1.5em; margin-top: 0; text-align: justify;">
                                                        {{ __("You can book an online consultation with a Physiotherapist at our Trusted Partners at True Physio, to get even more information and make sure you improve as quickly as possible") }}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td align="center">
                                                    <a href="https://www.truephysio.co.uk/clinics/online/" style="-webkit-text-size-adjust: none; background-color: black; border-radius: 4px;color: white; display: inline-block; overflow: hidden;text-decoration: none; border: 1px solid transparent; padding: 0.375rem 0.75rem;">
                                                        Book Appointment
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>

                                        <p>
                                            If you're having trouble clicking the "Book Appointment" button, copy and paste the URL below into your web browser: <a href="https://www.truephysio.co.uk/clinics/online/">https://www.truephysio.co.uk/clinics/online/</a>
                                        </p>
                                        @yield('subcopy')
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr>
                        <td style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box;">
                            <table class="footer" align="center" width="570" cellpadding="0" cellspacing="0" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; margin: 0 auto; padding: 0; text-align: center; width: 570px; -premailer-cellpadding: 0; -premailer-cellspacing: 0; -premailer-width: 570px;">
                                <tr>
                                    <td class="content-cell" align="center" style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; padding: 35px;">
                                        <p style="font-family: Avenir, Helvetica, sans-serif; box-sizing: border-box; line-height: 1.5em; margin-top: 0; color: #AEAEAE; font-size: 12px; text-align: center;">© {{ date('Y') }} {{ config('app.name', 'Laravel') }}. All rights reserved.</p>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>