<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Reporting</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        /*! Invoice Templates @author: Invoicebus @email: info@invoicebus.com @web: https://invoicebus.com @version: 1.0.0 @updated: 2015-03-09 09:03:07 @license: Invoicebus */
        /* Reset styles */
        @import url("https://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,700&subset=cyrillic,cyrillic-ext,latin,greek-ext,greek,latin-ext,vietnamese");
        html, body, div, span, applet, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        a, abbr, acronym, address, big, cite, code,
        del, dfn, em, img, ins, kbd, q, s, samp,
        small, strike, strong, sub, sup, tt, var,
        b, u, i, center,
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, embed,
        figure, figcaption, footer, header, hgroup,
        menu, nav, output, ruby, section, summary,
        time, mark, audio, video {
            margin: 0;
            padding: 0;
            border: 0;
            font: inherit;
            font-size: 100%;
            vertical-align: baseline;
        }

        html {
            line-height: 1;
        }

        ol, ul {
            list-style: none;
        }

        table {
            border-collapse: collapse;
            border-spacing: 0;
        }

        caption, th, td {
            text-align: left;
            font-weight: normal;
            vertical-align: middle;
        }

        q, blockquote {
            quotes: none;
        }
        q:before, q:after, blockquote:before, blockquote:after {
            content: "";
            content: none;
        }

        a img {
            border: none;
        }

        article, aside, details, figcaption, figure, footer, header, hgroup, main, menu, nav, section, summary {
            display: block;
        }

        /* Invoice styles */
        /**
         * DON'T override any styles for the <html> and <body> tags, as this may break the layout.
         * Instead wrap everything in one main <div id="container"> element where you may change
         * something like the font or the background of the invoice
         */
        html, body {
            /* MOVE ALONG, NOTHING TO CHANGE HERE! */
        }

        /**
         * IMPORTANT NOTICE: DON'T USE '!important' otherwise this may lead to broken print layout.
         * Some browsers may require '!important' in oder to work properly but be careful with it.
         */
        .clearfix {
            display: block;
            clear: both;
        }

        .hidden {
            display: none;
        }

        b, strong, .bold {
            font-weight: bold;
        }

        #container {
            font: normal 13px/1.4em 'Open Sans', Sans-serif;
            margin: 0 auto;
            padding: 50px 40px;
            min-height: 1058px;
        }

        #memo .company-name {
            background: #8BA09E url("../../../../public/admin/pdf/img/arrows.png") 560px center no-repeat;
            background-size: 100px auto;
            padding: 10px 20px;
            position: relative;
            margin-bottom: 15px;
        }
        #memo .company-name span {
            color: white;
            display: inline-block;
            min-width: 20px;
            font-size: 36px;
            font-weight: bold;
            line-height: 1em;
        }
        #memo .company-name .right-arrow {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            width: 100px;
            background: url("../../../../public/admin/pdf/img/right-arrow.png") right center no-repeat;
            background-size: auto 60px;
        }
        #memo .logo {
            float: left;
            clear: left;
            margin-left: 20px;
        }
        #memo .logo img {
            width: 150px;
            height: 100px;
        }
        #memo .company-info {
            margin-left: 20px;
            float: left;
            font-size: 12px;
            color: #8b8b8b;
        }
        #memo .company-info div {
            margin-bottom: 3px;
            min-width: 20px;
        }
        #memo .company-info span {
            display: inline-block;
            min-width: 20px;
        }
        #memo:after {
            content: '';
            display: block;
            clear: both;
        }

        #invoice-info {
            float: left;
            margin: 25px 0 0 20px;
        }
        #invoice-info > div {
            float: left;
        }
        #invoice-info > div > span {
            display: block;
            min-width: 20px;
            min-height: 18px;
            margin-bottom: 3px;
        }
        #invoice-info > div:last-child {
            margin-left: 20px;
        }
        #invoice-info:after {
            content: '';
            display: block;
            clear: both;
        }

        #client-info {
            float: right;
            margin: 5px 20px 0 0;
            min-width: 220px;
            text-align: right;
        }
        #client-info > div {
            margin-bottom: 3px;
            min-width: 20px;
        }
        #client-info span {
            display: block;
            min-width: 20px;
        }

        #invoice-title-number {
            text-align: center;
            margin: 20px 0;
        }
        #invoice-title-number span {
            display: inline-block;
            min-width: 20px;
        }
        #invoice-title-number #title {
            margin-right: 15px;
            text-align: right;
            font-size: 20px;
            font-weight: bold;
        }
        #invoice-title-number #number {
            font-size: 15px;
            text-align: left;
        }

        table {
            table-layout: fixed;
        }
        table th, table td {
            vertical-align: top;
            word-break: keep-all;
            word-wrap: break-word;
        }

        #items {
            margin: 20px 0 35px 0;
        }
        #items .first-cell, #items table th:first-child, #items table td:first-child {
            width: 18px;
            text-align: right;
        }
        #items table {
            border-collapse: separate;
            width: 100%;
        }
        #items table th {
            padding: 12px 10px;
            text-align: right;
            background: #E6E7E7;
            border-bottom: 4px solid #487774;
        }
        #items table th:nth-child(2) {
            width: 30%;
            text-align: left;
        }
        #items table th:last-child {
            text-align: right;
            padding-right: 20px !important;
        }
        #items table td {
            padding: 15px 10px;
            text-align: right;
            border-right: 1px solid #CCCCCF;
        }
        #items table td:first-child {
            text-align: left;
            border-right: 0 !important;
        }
        #items table td:nth-child(2) {
            text-align: left;
        }
        #items table td:last-child {
            border-right: 0 !important;
            padding-right: 20px !important;
        }

        .currency {
            border-bottom: 4px solid #487774;
            padding: 0 20px;
        }
        .currency span {
            font-size: 11px;
            font-style: italic;
            color: #8b8b8b;
            display: inline-block;
            min-width: 20px;
        }

        #sums {
            float: right;
            background: #8BA09E url("../../../../public/admin/pdf/img/left-arrow.png") -17px bottom no-repeat;
            background-size: auto 100px;
            color: white;
        }
        #sums table tr th, #sums table tr td {
            min-width: 100px;
            padding: 8px 20px 8px 35px;
            text-align: right;
            font-weight: 600;
        }
        #sums table tr th {
            text-align: left;
            padding-right: 25px;
        }
        #sums table tr.amount-total th {
            text-transform: uppercase;
        }
        #sums table tr.amount-total th, #sums table tr.amount-total td {
            font-size: 16px;
            font-weight: bold;
        }
        #sums table tr:last-child th {
            text-transform: uppercase;
        }
        #sums table tr:last-child th, #sums table tr:last-child td {
            font-size: 16px;
            font-weight: bold;
            padding-top: 20px !important;
            padding-bottom: 40px !important;
        }

        #terms {
            margin: 50px 20px 10px 20px;
        }
        #terms > span {
            display: inline-block;
            min-width: 20px;
            font-weight: bold;
        }
        #terms > div {
            margin-top: 10px;
            min-height: 50px;
            min-width: 50px;
        }

        .payment-info {
            margin: 0 20px;
        }
        .payment-info div {
            font-size: 12px;
            color: #8b8b8b;
            display: inline-block;
            min-width: 20px;
        }

        .ib_bottom_row_commands {
            margin: 10px 0 0 20px !important;
        }

        .ibcl_tax_value:before {
            color: white !important;
        }

        /**
         * If the printed invoice is not looking as expected you may tune up
         * the print styles (you can use !important to override styles)
         */
        @media print {
            /* Here goes your print styles */
        }

    </style>
    <link href="/admin/css/template.css" rel="stylesheet">
</head>
<body>
<div id="container">
    <section id="memo">
        <div class="company-name">
            <span>Company Name</span>
            <div class="right-arrow"></div>
        </div>

        <div class="logo">
            <img src="{{asset('admin/images/user.png')}}"/>
        </div>

        <div class="company-info">
            <div>
                <span>Company Address</span> <span>Company City Zip State</span>
            </div>
            <div>Company Email</div>
            <div>Company Phone Fax</div>
        </div>

    </section>

    <section id="invoice-info">
        <div>
            <span>Issue Date Label</span>
            <span>Due Date Label</span>
            <span>Net Term Label</span>
            <span>Po Number Label</span>
        </div>

        <div>
            <span>8/3/2017</span>
            <span>8/15/2017</span>
            <span>245698</span>
            <span>987456</span>
        </div>
    </section>

    <section id="client-info">
        <span>Bill To Label</span>
        <div>
            <span class="bold">Client Name</span>
        </div>

        <div>
            <span>Client Address</span>
        </div>

        <div>
            <span>Client City Zip State</span>
        </div>

        <div>
            <span>Client Phone Fax</span>
        </div>

        <div>
            <span>Client Email</span>
        </div>

        <div>
            <span>Client Other</span>
        </div>
    </section>

    <div class="clearfix"></div>

    <section id="invoice-title-number">

        <span id="title">Invoice Title</span>
        <span id="number">Invoice Number</span>

    </section>

    <div class="clearfix"></div>

    <section id="items">

        <table cellpadding="0" cellspacing="0">

            <tr>
                <th>#</th>
                <th>Item Description Label</th>
                <th>Item Quantity Label</th>
                <th>Item Price Label</th>
                <th>Item Discount Label</th>
                <th>Item Tax Label</th>
                <th>Item Line Total Label</th>
            </tr>

            <tr data-iterate="item">
                <td>1</td>
                <td>Mobile Hand Free</td>
                <td>2</td>
                <td>100</td>
                <td>0</td>
                <td>10</td>
                <td>210</td>
            </tr>

        </table>

    </section>

    <div class="currency">
        <span>Currency Label}</span> <span>Currency</span>
    </div>

    <section id="sums">

        <table cellpadding="0" cellspacing="0">
            <tr>
                <th>Amount Subtotal Label</th>
                <td>210</td>
            </tr>

            <tr data-iterate="tax">
                <th>Tax Name}</th>
                <td>10</td>
            </tr>

            <tr class="amount-total">
                <th>Amount Total Label</th>
                <td>210</td>
            </tr>

            <tr data-hide-on-quote="true">
                <th>Amount Paid Label</th>
                <td>0</td>
            </tr>

            <tr data-hide-on-quote="true">
                <th>Amount Due Label</th>
                <td>0</td>
            </tr>

        </table>

    </section>

    <div class="clearfix"></div>

    <section id="terms">

        <span>Terms Label</span>
        <div>Terms</div>

    </section>

    <div class="payment-info">
        <div>Payment Info1</div>
        <div>Payment Info2</div>
        <div>Payment Info3</div>
        <div>Payment Info4</div>
        <div>Payment Info5</div>
    </div>
</div>


</body>
</html>
