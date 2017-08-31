<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Reporting</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('admin.reports.style')
</head>
<body>

<div id="container">
    <section id="memo">
        <div class="company-name">
            <span>E Condo</span>
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
            <span>Invoice Num:</span>
            <span>Issue Date:</span>
            <span>Due Date:</span>
            <span>Due Amount:</span>
        </div>

        <div>
            {{--<span id="number">{{ $invoice->invoice_id }}</span>--}}
            {{--<span>{{ $invoice->date->format('d/m/Y') }}</span>--}}
            {{--<span>8/15/2017</span>--}}
            {{--<span>{{ $invoice->invoice_amount }}</span>--}}
        </div>
    </section>

    <section id="client-info">
        {{--<span>Bill To {{ auth()->user()->name }}</span>--}}
        {{--<div>--}}
            {{--<span class="bold">{{ $invoice->owner->owner_name }}</span>--}}
        {{--</div>--}}

        {{--<div>--}}
            {{--<span>{{ $invoice->owner->owner_address }}</span>--}}
        {{--</div>--}}

        {{--<div>--}}
            {{--<span>{{ @$invoice->owner->owner_phone1 }}</span>--}}
        {{--</div>--}}
    </section>

    <div class="clearfix"></div>

    <section id="invoice-title-number">

{{--        <span id="title">{{ @$invoice->owner->owner_name }} - Invoice</span>--}}
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
        <span>Currency Label</span> <span>Currency</span>
    </div>

    <section id="sums">

        <table cellpadding="0" cellspacing="0">
            <tr>
                <th>Amount Subtotal Label</th>
                <td>210</td>
            </tr>

            <tr data-iterate="tax">
                <th>Tax Name</th>
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
