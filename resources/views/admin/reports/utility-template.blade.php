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
            font-size: 13px;
        }
        #container {
            font: normal 13px/1.4em 'Open Sans', Sans-serif;
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
    <section id="memo">
        <div class="company-name">
            <span>Invoice</span>
            <div class="right-arrow"></div>
        </div>
        <div class="company-name2">
            <span>RM{{$invoice->meterReading->readingAmount()}}</span>

        </div>
    </section>

    <section style="float: left">
        <table style="margin: 20px">
            <tr>
                <td>
                    <span>Bill To:</span>
                </td>
                <td>
                    <span>{{$meter->owner->owner_name}}	</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span> Property :	</span>
                </td>
                <td>
                    <span>{{$meter->lot->lotType->lot_type_name}}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Lot No.  : </span>
                </td>
                <td>
                    <span> {{$meter->lot->lot_name}}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Subject:  </span>
                </td>
                <td>
                    <span> {{$meter->meterType->meter_name}} MONTH OF {{$invoice->meterReading->readingMonthAndYear()['month']}}, {{$invoice->meterReading->readingMonthAndYear()['year']}} </span>
                </td>
            </tr>

        </table>
    </section>


    <section style="float: right">
        <table style="margin: 20px">
            <tr>
                <td>
                    <span>Invoice No. :	</span>
                </td>
                <td>
                    <span>INV-{{ $invoice->invoice_id }}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span> Invoice Date  : </span>
                </td>
                <td>
                    <span>{{\Carbon\Carbon::parse($invoice->date)->format('F d, Y')}}</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Payment Due:   </span>
                </td>
                <td>
                    <span> {{$invoice->due_date}} </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Status:   </span>
                </td>
                <td>
                    <span> {{ ucwords($invoice->invoice_status) }} </span>
                </td>
            </tr>

        </table>
    </section>

    <section id="items">

        <table id="table3" style="width: 100%; ">

            <tr>
                <th>Item Description</th>
                <th>Readings (units)</th>
                <th>Amount (RM)</th>
            </tr>
            <tr>
                <td>
                    <table id="nested-table" border="0" style="border-width: 0px; border-color: white">
                        <tr>
                            <td>
                                <span>Meter No.         :	</span>
                            </td>
                            <td>
                                <span>{{$meter->id}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span> Current reading as at: 	</span>
                            </td>
                            <td>
                                <span>{{$invoice->meterReading->reading_date}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>Previous reading as at:  </span>
                            </td>
                            <td>
                                <span> {{$invoice->meterReading->previousReadingAt()}}</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>Usage :  </span>
                            </td>

                        </tr>

                    </table>
                </td>
                <td>
                    <table border="0" id="nested-table">

                        <br>
                        <br>
                        <tr>
                            <td>
                                <span>{{$invoice->meterReading->last_reading}}</span>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <span> {{$invoice->meterReading->previousReadingUnits()}}</span>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <span>{{$invoice->meterReading->unitUsage()}}</span>
                            </td>

                        </tr>

                    </table>

                </td>
                <td>{{$invoice->meterReading->readingAmount()}}</td>

            </tr>
            <tr>
                <td colspan="2" style="text-align: right"><b>Total</b></td>
                <td>{{$invoice->meterReading->readingAmount()}}</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right"><b>GST ({{config('utility.gst')}}%)</b></td>
                <td>{{$gst = \App\PropertyManagement\Helper::gstCalculate( $invoice->meterReading->readingAmount() , config('utility.gst'))}}</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right"><b>Outstanding Charges (+)</b></td>
                <td>{{$tot = $invoice->meterReading->readingAmount() + $gst}}</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right"><b>Credit Balance (-)</b></td>
                <td>{{ $cred = $invoice->paid_amount}}</td>
            </tr>
            <tr>
                <td colspan="2" style="font-size: initial; text-align: right"><b>Total</b></td>
                <td><b>{{$tot - $cred}}</b></td>
            </tr>

        </table>

    </section>
    <section id="invoice-title-number" style="margin: 20px 5px 5px 0px" >

        <span id="title" style="font-size: 9px;">Notes:</span><br>
        <span id="title" style="font-size: 9px; float: right; padding-right: 30px">Charges rate Table:</span>

    </section>

    <section style="padding-left: 80%;">
        <table id="sum-table" style="width: 20%; float: left; ">
            <tr>

                <td>
                    from
                </td>
                <td>
                    To
                </td>
                <td>
                    Rate(<span style="font-size: 7px">RM</span>)
                </td>
            </tr>
            @foreach($meter->meterType->meterRates as $meterRate)
            <tr>
                <td>
                    {{$meterRate->from}}
                </td>
                <td>
                    {{$meterRate->to}}
                </td>
                <td>
                    {{$meterRate->rate}}
                </td>
            </tr>
            @endforeach



        </table>
    </section>
    <section style="    margin: -129px 10px;
   padding-top: 0%;
    width: 100%;
    float: left;">
        <ul style="font-size: 9px;">
            <li>All cheques are to be crossed and made payable to INNOTTER EXPANSION COMPANY</li>
            <li>Bank transfer details:
                <table id="ul-table">
                    <tr>
                        <td>
                            Account Name: INNOTTER EXPANSION COMPANY
                        </td>

                    </tr>
                    <tr>
                        <td>
                            Account No.: 1234567890
                        </td>

                    </tr>
                    <tr>
                        <td>
                            Name of Bank: RHB BANK
                        </td>

                    </tr>

                </table>
            </li>
            <li>Minimum charges applied at RM5.00.</li>
            <li>Please ignore this invoice if you have paid within last few days.</li>
        </ul>
    </section>
</div>


</body>
</html>
