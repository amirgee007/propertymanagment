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
    <section id="memo">
        <div class="company-name">
            <span>Invoice</span>
            <div class="right-arrow"></div>
        </div>
        <div class="company-name2">
            <span>RM20,000</span>
        </div>
    </section>

    <section style="float: left">
        <table style="margin: 20px">
            <tr>
                <td>
                    <span>Bill To:	</span>
                </td>
                <td>
                    <span>Mr. Simon Wong</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span> Property : 	</span>
                </td>
                <td>
                    <span>Jazz Apartment 8/15/2017</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Lot No.    : </span>
                </td>
                <td>
                    <span> A100</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Subject:  </span>
                </td>
                <td>
                    <span> WATER CHARGES MONTH OF AUGUST, 2017 </span>
                </td>
            </tr>

        </table>
    </section>


    <section style="float: right">
        <table style="margin: 20px">
            <tr>
                <td>
                    <span>Bill To:	</span>
                </td>
                <td>
                    <span>Mr. Simon Wong</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span> Property : 	</span>
                </td>
                <td>
                    <span>Jazz Apartment 8/15/2017</span>
                </td>
            </tr>
            <tr>
                <td>
                    <span>Lot No.    : </span>
                </td>
                <td>
                    <span> A100</span>
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
                    <table id="nested-table">
                        <tr>
                            <td>
                                <span>Bill To:	</span>
                            </td>
                            <td>
                                <span>Mr. Simon Wong</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span> Property : 	</span>
                            </td>
                            <td>
                                <span>Jazz Apartment 8/15/2017</span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <span>Lot No.    : </span>
                            </td>
                            <td>
                                <span> A100</span>
                            </td>
                        </tr>

                    </table>
                </td>
                <td>
                    <table id="nested-table">
                        <tr>
                            <td>
                                <span>123</span>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <span> 123</span>
                            </td>

                        </tr>
                        <tr>
                            <td>
                                <span>12</span>
                            </td>

                        </tr>

                    </table>

                </td>
                <td>2</td>

            </tr>
            <tr>
                <td colspan="2" style="text-align: right"><b>Total</b></td>
                <td>4.24</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right"><b>GST (6%)</b></td>
                <td>4.24</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right"><b>Outstanding Charges (+)</b></td>
                <td>4.24</td>
            </tr>
            <tr>
                <td colspan="2" style="text-align: right"><b>Credit Balance (-)</b></td>
                <td>4.24</td>
            </tr>
            <tr>
                <td colspan="2" style="font-size: initial; text-align: right"><b>Total</b></td>
                <td><b>4.24</b></td>
            </tr>

        </table>

    </section>
    <section id="invoice-title-number" style="margin: 20px 5px 5px 0px" >

        <span id="title" style="font-size: 9px;">Notes:</span>
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
            <tr>
                <td>
                    0
                </td>
                <td>
                    100
                </td>
                <td>
                    0.95
                </td>
            </tr>
            <tr>
                <td>
                    101
                </td>
                <td>
                    300
                </td>
                <td>
                    1.15
                </td>
            </tr>
            <tr>
                <td>
                    300
                </td>
                <td>
                    above
                </td>
                <td>
                    1.30
                </td>
            </tr>


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
