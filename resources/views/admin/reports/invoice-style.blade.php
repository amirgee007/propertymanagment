<style>
    /*! Invoice Templates

    @author

    : Invoicebus

    @email

    : info

    @invoicebus

    .com

    @web

    : https://invoicebus.com

    @version

    : 1.0.0

    @updated

    : 2015-03-09 09:03:07

    @license

    : Invoicebus */
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
    }

    #memo {
        margin-bottom: 10%;
    }

    #memo .company-name {
        background: #fca12b;
        background-size: 100px auto;
        padding: 3%;
        position: absolute;
        width: 55%;
        float: left;
    }

    #memo .company-name2 {
        background: rgb(221, 132, 16);
        background-size: 100px auto;
        padding: 3%;
        position: absolute;
        width: 84%;
        float: right;
    }

    #memo span {
        color: #000;
        display: inline-block;
        min-width: 20px;
        font-size: 36px;
        line-height: 1em;
    }

    .company-name2 span {
        float: right;
    }

    #memo:after {
        content: '';
        display: block;
        clear: both;
    }

    #total-payable {
        font-size: 16px;
    }
</style>