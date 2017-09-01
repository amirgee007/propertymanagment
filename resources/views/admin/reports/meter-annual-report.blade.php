<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Reporting</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('admin.reports.invoice-style')
    <style>
        body, html {
            height: 100%;
            width: 100%;
            margin: 0;
            padding: 0;
            left: 0;
            top: 0;
            font-size: 100%
        }
        h1 {
            font-size: 2.5rem
        }

        h2 {
            font-size: 2rem
        }

        h3 {
            font-size: 1.375rem
        }

        h4 {
            font-size: 1.125rem
        }

        h5 {
            font-size: 1rem
        }

        h6 {
            font-size: .875rem
        }
        p {
            font-size: 1.125rem;
            font-weight: 200;
            line-height: 1.8
        }

        body {
            position: relative;
            margin: 0 auto;
            color: #555555;
            background: #FFFFFF;
            font-size: 12px;
        }
        #container {
            font: normal 12px/1.4em 'Open Sans', Sans-serif;
            width: 90%;
            margin-left: auto;
            margin-right: auto

        }
        #table3,#table3 th,#table3 td {
            border: 1px solid black;
        }
        #sum-table,#sum-table th,#sum-table td {
            border: 1px solid black;
            font-size: 9px;
        }
        #nested-table,#nested-table th,#nested-table td {
            border: 0px solid black;
        }
        th, td{
            padding: 7px;
        }
        #ul-table td{
            padding: 2px;
        }
    </style>
</head>
<body >
    <div id="container">
        <div>
            <table >
                <tr>
                    <td>
                        <span>Lot No.   : </span>
                    </td>
                    <td>
                        <span>{{$meter->lot->lot_name}}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>Meter ID :</span>
                    </td>
                    <td>
                        <span>{{$meter->id}}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span>Owner :</span>
                    </td>
                    <td>
                        <span>{{$meter->owner()->owner_name}}</span>
                    </td>
                </tr>

                <tr>
                    <td>
                        <span>Prepared On :</span>
                    </td>
                    <td>
                        <span>{{\Carbon\Carbon::now()->toDateString()}}</span>
                    </td>
                </tr>
            </table>
        </div>

        <div>
            <table id="table3" style="table-layout: auto; ">
                <thead>
                    <tr>
                        <th>Month</th>
                        <th>Reading Date</th>
                        <th>Previous Reading</th>
                        <th>Current Reading</th>
                        <th>Usage</th>
                        <th>Amount (RM)</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($data as $datum)
                    <tr>
                        <td>{{$datum['month']}}</td>
                        <td>{{$datum['reading_date']}}</td>
                        <td>{{$datum['previous']}}</td>
                        <td>{{$datum['current']}}</td>
                        <td>{{$datum['usage']}}</td>
                        <td>{{$datum['amount']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
