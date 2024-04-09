<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta charset="UTF-8">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Receipt</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('assets/dist/css/adminlte.min.css')}}">
    <link href="{{ storage_path('fonts/fonts.css') }}" rel='stylesheet' type='text/css'>

    <style>
        body,
        table {
            font-family: CeraPro;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row mt-4">
            <div class="col-md-6">
                <img src="{{ asset('assets/front/images/pain_map_logo_back.png') }}" width="128px" class="brand-image img-circle elevation-2" alt="PainMap" alt="User Image">
                <h3 class="font-weight-light mt-1"> Receipt</h3>
            </div>
            <div class="col-md-6">
                <div class="float-right">
                    <h2 class="font-weight-light">TruePhysio Ltd</h2>
                    <h6 class="font-weight-light">
                        Broadway House, 74 Broadway Street, <br />Oldham, England, OL8 1LR.
                    </h6>
                    <h6 class="font-weight-light">
                        info@truephysio.co.uk
                    </h6>
                </div>
            </div>
        </div>

        <h6>
            To: <span class="font-weight-light">nanabaahakuffu@outlook.com</span>
        </h6>
        <!-- <hr /> -->
        <h6>
            Date: <span class="font-weight-light">{{ __('September 7, 2021')}}</span>
        </h6>

        <h6>
            Product: <span class="font-weight-light">Product</span>
        </h6>
        <!-- <hr /> -->
        <h6>
            Invoice Number: <span class="font-weight-light">B0DC993D-0015</span>
        </h6>

        <table class="table mt-3">

            <thead class="thead-dark">
                <tr>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Amount Paid</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Subscription</td>
                    <td>March 7, 2021 - April 7, 2021</td>
                    <td>200.00</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th class="float-right">Total</th>
                    <th>200.00</th>
                </tr>
            </tfoot>
        </table>

    </div>
    <!-- </div> -->
    <!-- jQuery -->
    <script src="{{asset('assets/plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
</body>

</html>