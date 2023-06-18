<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Payment Incoice</title>

    <style>
        html,
        body {
            margin: 10px;
            padding: 10px;
            font-family: sans-serif;
        }
        h1,h2,h3,h4,h5,h6,p,span,label {
            font-family: sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 0px !important;
        }
        table thead th {
            height: 28px;
            text-align: left;
            font-size: 16px;
            font-family: sans-serif;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
            font-size: 14px;
        }

        .heading {
            font-size: 24px;
            margin-top: 12px;
            margin-bottom: 12px;
            font-family: sans-serif;
        }
        .small-heading {
            font-size: 18px;
            font-family: sans-serif;
        }
        .total-heading {
            font-size: 18px;
            font-weight: 700;
            font-family: sans-serif;
        }
        .order-details tbody tr td:nth-child(1) {
            width: 20%;
        }
        .order-details tbody tr td:nth-child(3) {
            width: 20%;
        }

        .text-start {
            text-align: left;
        }
        .text-end {
            text-align: right;
        }
        .text-center {
            text-align: center;
        }
        .company-data span {
            margin-bottom: 4px;
            display: inline-block;
            font-family: sans-serif;
            font-size: 14px;
            font-weight: 400;
        }
        .no-border {
            border: 1px solid #fff !important;
        }
        .bg-blue {
            background-color: #414ab1;
            color: #fff;
        }
    </style>
</head>
<body>

    <table class="order-details">
        <thead>
            <tr>
                <th width="50%" colspan="2">
                    <h2 class="text-start">United African Univerisity Of Tanzania</h2>
                </th>
                <th width="50%" colspan="2" class="text-end company-data"> 
                    <span>Date: <?php echo date("Y-m-d"); ?></span> <br> 
                    <span>Address: Vijibweni, Kigamboni, Dar es Salaam</span> <br>
                </th>
            </tr>
            <tr class="bg-blue">
                <th width="50%" colspan="2">Payment Details</th>
                <th width="50%" colspan="2">User Details</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Amount paid:</td>
                <td>1,600,209 TZS</td>

                <td>Full Name:</td>
                <td>Student Student</td>
            </tr>
            <tr>
                <td>Reference number.:</td>
                <td>fkhxapDZAkQ-2023-06-17 21:43:29</td>

                <td>Email Address:</td>
                <td>student@student.com</td>
            </tr>
            <tr>
                <td>Date:</td>
                <td>22-09-2022 10:54 AM</td>

                <td>Registration Number:</td>
                <td>19000187</td>
            </tr>
            <tr>
                <td>Payment Mode:</td>
                <td>PayPal</td>

                <td>Programme:</td>
                <td>BCEIT</td>
            </tr> 
        </tbody>
    </table>
</body>
</html>