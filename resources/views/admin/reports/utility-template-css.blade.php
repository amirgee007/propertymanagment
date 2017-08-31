<style>
    #sidebar {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        width: 250px;
        padding: 0;
        margin: 0;
        overflow: auto
    }

    #page-container {
        position: absolute;
        top: 0;
        left: 0;
        margin: 0;
        padding: 0;
        border: 0
    }

    @media screen {
        #sidebar.opened + #page-container {
            left: 250px
        }

        #page-container {
            bottom: 0;
            right: 0;
            overflow: auto
        }

        .loading-indicator {
            display: none
        }

        .loading-indicator.active {
            display: block;
            position: absolute;
            width: 64px;
            height: 64px;
            top: 50%;
            left: 50%;
            margin-top: -32px;
            margin-left: -32px
        }

        .loading-indicator img {
            position: absolute;
            top: 0;
            left: 0;
            bottom: 0;
            right: 0
        }
    }

    @media print {
        @page {
            margin: 0
        }

        html {
            margin: 0
        }

        body {
            margin: 0;
            -webkit-print-color-adjust: exact
        }

        #sidebar {
            display: none
        }

        #page-container {
            width: auto;
            height: auto;
            overflow: visible;
            background-color: transparent
        }

        .d {
            display: none
        }
    }

    .pf {
        position: relative;
        background-color: white;
        overflow: hidden;
        margin: 0;
        border: 0
    }

    .pc {
        position: absolute;
        border: 0;
        padding: 0;
        margin: 0;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        display: block;
        transform-origin: 0 0;
        -ms-transform-origin: 0 0;
        -webkit-transform-origin: 0 0
    }

    .pc.opened {
        display: block
    }

    .bf {
        position: absolute;
        border: 0;
        margin: 0;
        top: 0;
        bottom: 0;
        width: 100%;
        height: 100%;
        -ms-user-select: none;
        -moz-user-select: none;
        -webkit-user-select: none;
        user-select: none
    }

    .bi {
        position: absolute;
        border: 0;
        margin: 0;
        -ms-user-select: none;
        -moz-user-select: none;
        -webkit-user-select: none;
        user-select: none
    }

    @media print {
        .pf {
            margin: 0;
            box-shadow: none;
            page-break-after: always;
            page-break-inside: avoid
        }

        @-moz-document url-prefix() {
            .pf {
                overflow: visible;
                border: 1px solid #fff
            }
            .pc {
                overflow: visible
            }
        }
    }

    .c {
        position: absolute;
        border: 0;
        padding: 0;
        margin: 0;
        overflow: hidden;
        display: block
    }

    .t {
        position: absolute;
        white-space: pre;
        font-size: 1px;
        transform-origin: 0 100%;
        -ms-transform-origin: 0 100%;
        -webkit-transform-origin: 0 100%;
        unicode-bidi: bidi-override;
        -moz-font-feature-settings: "liga" 0
    }

    .t:after {
        content: ''
    }

    .t:before {
        content: '';
        display: inline-block
    }

    .t span {
        position: relative;
        unicode-bidi: bidi-override
    }

    ._ {
        display: inline-block;
        color: transparent;
        z-index: -1
    }

    ::selection {
        background: rgba(127, 255, 255, 0.4)
    }

    ::-moz-selection {
        background: rgba(127, 255, 255, 0.4)
    }

    .pi {
        display: none
    }

    .d {
        position: absolute;
        transform-origin: 0 100%;
        -ms-transform-origin: 0 100%;
        -webkit-transform-origin: 0 100%
    }

    .it {
        border: 0;
        background-color: rgba(255, 255, 255, 0.0)
    }

    .ir:hover {
        cursor: pointer
    }

    @keyframes fadein {
        from {
            opacity: 0
        }
        to {
            opacity: 1
        }
    }

    @-webkit-keyframes fadein {
        from {
            opacity: 0
        }
        to {
            opacity: 1
        }
    }

    @keyframes swing {

    0
    {
        transform: rotate(0)
    }
    10
    %
    {
        transform: rotate(0)
    }
    90
    %
    {
        transform: rotate(720deg)
    }
    100
    %
    {
        transform: rotate(720deg)
    }
    }
    @-webkit-keyframes swing {

    0
    {
        -webkit-transform: rotate(0)
    }
    10
    %
    {
        -webkit-transform: rotate(0)
    }
    90
    %
    {
        -webkit-transform: rotate(720deg)
    }
    100
    %
    {
        -webkit-transform: rotate(720deg)
    }
    }
    @media screen {
        #sidebar {
            background-color: #2f3236;
            background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI0IiBoZWlnaHQ9IjQiPgo8cmVjdCB3aWR0aD0iNCIgaGVpZ2h0PSI0IiBmaWxsPSIjNDAzYzNmIj48L3JlY3Q+CjxwYXRoIGQ9Ik0wIDBMNCA0Wk00IDBMMCA0WiIgc3Ryb2tlLXdpZHRoPSIxIiBzdHJva2U9IiMxZTI5MmQiPjwvcGF0aD4KPC9zdmc+")
        }

        #outline {
            font-family: Georgia, Times, "Times New Roman", serif;
            font-size: 13px;
            margin: 2em 1em
        }

        #outline ul {
            padding: 0
        }

        #outline li {
            list-style-type: none;
            margin: 1em 0
        }

        #outline li > ul {
            margin-left: 1em
        }

        #outline a, #outline a:visited, #outline a:hover, #outline a:active {
            line-height: 1.2;
            color: #e8e8e8;
            text-overflow: ellipsis;
            white-space: nowrap;
            text-decoration: none;
            display: block;
            overflow: hidden;
            outline: 0
        }

        #outline a:hover {
            color: #0cf
        }

        #page-container {
            background-color: #9e9e9e;
            background-image: url("data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1IiBoZWlnaHQ9IjUiPgo8cmVjdCB3aWR0aD0iNSIgaGVpZ2h0PSI1IiBmaWxsPSIjOWU5ZTllIj48L3JlY3Q+CjxwYXRoIGQ9Ik0wIDVMNSAwWk02IDRMNCA2Wk0tMSAxTDEgLTFaIiBzdHJva2U9IiM4ODgiIHN0cm9rZS13aWR0aD0iMSI+PC9wYXRoPgo8L3N2Zz4=");
            -webkit-transition: left 500ms;
            transition: left 500ms
        }

        .pf {
            margin: 13px auto;
            box-shadow: 1px 1px 3px 1px #333;
            border-collapse: separate
        }

        .pc.opened {
            -webkit-animation: fadein 100ms;
            animation: fadein 100ms
        }

        .loading-indicator.active {
            -webkit-animation: swing 1.5s ease-in-out .01s infinite alternate none;
            animation: swing 1.5s ease-in-out .01s infinite alternate none
        }

        .checked {
            background: no-repeat url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3goQDSYgDiGofgAAAslJREFUOMvtlM9LFGEYx7/vvOPM6ywuuyPFihWFBUsdNnA6KLIh+QPx4KWExULdHQ/9A9EfUodYmATDYg/iRewQzklFWxcEBcGgEplDkDtI6sw4PzrIbrOuedBb9MALD7zv+3m+z4/3Bf7bZS2bzQIAcrmcMDExcTeXy10DAFVVAQDksgFUVZ1ljD3yfd+0LOuFpmnvVVW9GHhkZAQcxwkNDQ2FSCQyRMgJxnVdy7KstKZpn7nwha6urqqfTqfPBAJAuVymlNLXoigOhfd5nmeiKL5TVTV+lmIKwAOA7u5u6Lped2BsbOwjY6yf4zgQQkAIAcedaPR9H67r3uYBQFEUFItFtLe332lpaVkUBOHK3t5eRtf1DwAwODiIubk5DA8PM8bYW1EU+wEgCIJqsCAIQAiB7/u253k2BQDDMJBKpa4mEon5eDx+UxAESJL0uK2t7XosFlvSdf0QAEmlUnlRFJ9Waho2Qghc1/U9z3uWz+eX+Wr+lL6SZfleEAQIggA8z6OpqSknimIvYyybSCReMsZ6TislhCAIAti2Dc/zejVNWwCAavN8339j27YbTg0AGGM3WltbP4WhlRWq6Q/btrs1TVsYHx+vNgqKoqBUKn2NRqPFxsbGJzzP05puUlpt0ukyOI6z7zjOwNTU1OLo6CgmJyf/gA3DgKIoWF1d/cIY24/FYgOU0pp0z/Ityzo8Pj5OTk9PbwHA+vp6zWghDC+VSiuRSOQgGo32UErJ38CO42wdHR09LBQK3zKZDDY2NupmFmF4R0cHVlZWlmRZ/iVJUn9FeWWcCCE4ODjYtG27Z2Zm5juAOmgdGAB2d3cBADs7O8uSJN2SZfl+WKlpmpumaT6Yn58vn/fs6XmbhmHMNjc3tzDGFI7jYJrm5vb29sDa2trPC/9aiqJUy5pOp4f6+vqeJ5PJBAB0dnZe/t8NBajx/z37Df5OGX8d13xzAAAAAElFTkSuQmCC)
        }
    }

    .ff0 {
        font-family: sans-serif;
        visibility: hidden;
    }

    @font-face {
        font-family: ff1;
        src: url(f1.woff) format("woff");
    }

    .ff1 {
        font-family: ff1;
        line-height: 0.895996;
        font-style: normal;
        font-weight: normal;
        visibility: visible;
    }

    @font-face {
        font-family: ff2;
        src: url(f2.woff) format("woff");
    }

    .ff2 {
        font-family: ff2;
        line-height: 0.873535;
        font-style: normal;
        font-weight: normal;
        visibility: visible;
    }

    @font-face {
        font-family: ff3;
        src: url(f3.woff) format("woff");
    }

    .ff3 {
        font-family: ff3;
        line-height: 0.677246;
        font-style: normal;
        font-weight: normal;
        visibility: visible;
    }

    .m0 {
        transform: matrix(0.250000, 0.000000, 0.000000, 0.250000, 0, 0);
        -ms-transform: matrix(0.250000, 0.000000, 0.000000, 0.250000, 0, 0);
        -webkit-transform: matrix(0.250000, 0.000000, 0.000000, 0.250000, 0, 0);
    }

    .v0 {
        vertical-align: 0.000000px;
    }

    .ls0 {
        letter-spacing: 0.000000px;
    }

    .sc_ {
        text-shadow: none;
    }

    .sc0 {
        text-shadow: -0.015em 0 transparent, 0 0.015em transparent, 0.015em 0 transparent, 0 -0.015em transparent;
    }

    @media screen and (-webkit-min-device-pixel-ratio: 0) {
        .sc_ {
            -webkit-text-stroke: 0px transparent;
        }

        .sc0 {
            -webkit-text-stroke: 0.015em transparent;
            text-shadow: none;
        }
    }

    .ws0 {
        word-spacing: 0.000000px;
    }

    ._5 {
        width: 59.108000px;
    }

    ._6 {
        width: 173.740000px;
    }

    ._2 {
        width: 689.524000px;
    }

    ._1 {
        width: 850.168000px;
    }

    ._3 {
        width: 869.044000px;
    }

    ._0 {
        width: 1031.492000px;
    }

    ._4 {
        width: 1221.388000px;
    }

    .fc0 {
        color: rgb(0, 0, 0);
    }

    .fs2 {
        font-size: 28.000000px;
    }

    .fs0 {
        font-size: 44.000000px;
    }

    .fs1 {
        font-size: 56.000000px;
    }

    .y1d {
        bottom: 2.880000px;
    }

    .y7 {
        bottom: 3.954000px;
    }

    .y13 {
        bottom: 9.219999px;
    }

    .ye {
        bottom: 12.075999px;
    }

    .yc {
        bottom: 12.964000px;
    }

    .yb {
        bottom: 26.392001px;
    }

    .ya {
        bottom: 39.820001px;
    }

    .y9 {
        bottom: 66.676002px;
    }

    .y0 {
        bottom: 137.000000px;
    }

    .y1b {
        bottom: 241.576014px;
    }

    .y1a {
        bottom: 251.170038px;
    }

    .y19 {
        bottom: 260.764027px;
    }

    .y20 {
        bottom: 268.179008px;
    }

    .y18 {
        bottom: 269.985027px;
    }

    .y1f {
        bottom: 277.224009px;
    }

    .y17 {
        bottom: 279.206028px;
    }

    .y1e {
        bottom: 286.269009px;
    }

    .y16 {
        bottom: 288.427027px;
    }

    .y1c {
        bottom: 295.314009px;
    }

    .y15 {
        bottom: 298.021021px;
    }

    .y14 {
        bottom: 315.615009px;
    }

    .y12 {
        bottom: 333.635029px;
    }

    .y11 {
        bottom: 355.685032px;
    }

    .y10 {
        bottom: 377.735035px;
    }

    .yf {
        bottom: 399.785030px;
    }

    .yd {
        bottom: 421.835026px;
    }

    .y8 {
        bottom: 443.885026px;
    }

    .y6 {
        bottom: 520.535027px;
    }

    .y5 {
        bottom: 547.480019px;
    }

    .y4 {
        bottom: 576.462020px;
    }

    .y3 {
        bottom: 598.953017px;
    }

    .y2 {
        bottom: 621.444030px;
    }

    .y1 {
        bottom: 643.935027px;
    }

    .h9 {
        height: 10.545000px;
    }

    .h3 {
        height: 15.428000px;
    }

    .h8 {
        height: 20.097656px;
    }

    .h5 {
        height: 23.549999px;
    }

    .h6 {
        height: 30.593750px;
    }

    .h2 {
        height: 31.582031px;
    }

    .h7 {
        height: 38.937500px;
    }

    .h4 {
        height: 78.150002px;
    }

    .h1 {
        height: 633.000000px;
    }

    .h0 {
        height: 841.900024px;
    }

    .w6 {
        width: 29.850000px;
    }

    .w7 {
        width: 36.950001px;
    }

    .w8 {
        width: 44.000000px;
    }

    .w3 {
        width: 94.449997px;
    }

    .w4 {
        width: 111.500000px;
    }

    .w2 {
        width: 249.350006px;
    }

    .w5 {
        width: 342.299988px;
    }

    .w1 {
        width: 457.000000px;
    }

    .w0 {
        width: 595.299988px;
    }

    .x1 {
        left: 6.150000px;
    }

    .x3 {
        left: 11.472000px;
    }

    .x5 {
        left: 25.383999px;
    }

    .x6 {
        left: 38.862002px;
    }

    .x7 {
        left: 41.650000px;
    }

    .xc {
        left: 43.211001px;
    }

    .x8 {
        left: 45.998999px;
    }

    .x0 {
        left: 72.000000px;
    }

    .xe {
        left: 90.000000px;
    }

    .xf {
        left: 108.000000px;
    }

    .xb {
        left: 226.224005px;
    }

    .xd {
        left: 257.495993px;
    }

    .xa {
        left: 295.560004px;
    }

    .x9 {
        left: 312.845007px;
    }

    .x2 {
        left: 319.350006px;
    }

    .x4 {
        left: 412.299988px;
    }

    .x10 {
        left: 421.649994px;
    }

    .x11 {
        left: 449.999994px;
    }

    .x12 {
        left: 485.449993px;
    }

    @media print {
        .v0 {
            vertical-align: 0.000000pt;
        }

        .ls0 {
            letter-spacing: 0.000000pt;
        }

        .ws0 {
            word-spacing: 0.000000pt;
        }

        ._5 {
            width: 78.810667pt;
        }

        ._6 {
            width: 231.653333pt;
        }

        ._2 {
            width: 919.365333pt;
        }

        ._1 {
            width: 1133.557333pt;
        }

        ._3 {
            width: 1158.725333pt;
        }

        ._0 {
            width: 1375.322667pt;
        }

        ._4 {
            width: 1628.517333pt;
        }

        .fs2 {
            font-size: 37.333333pt;
        }

        .fs0 {
            font-size: 58.666667pt;
        }

        .fs1 {
            font-size: 74.666667pt;
        }

        .y1d {
            bottom: 3.840000pt;
        }

        .y7 {
            bottom: 5.272001pt;
        }

        .y13 {
            bottom: 12.293332pt;
        }

        .ye {
            bottom: 16.101332pt;
        }

        .yc {
            bottom: 17.285333pt;
        }

        .yb {
            bottom: 35.189335pt;
        }

        .ya {
            bottom: 53.093334pt;
        }

        .y9 {
            bottom: 88.901335pt;
        }

        .y0 {
            bottom: 182.666667pt;
        }

        .y1b {
            bottom: 322.101351pt;
        }

        .y1a {
            bottom: 334.893384pt;
        }

        .y19 {
            bottom: 347.685369pt;
        }

        .y20 {
            bottom: 357.572011pt;
        }

        .y18 {
            bottom: 359.980036pt;
        }

        .y1f {
            bottom: 369.632011pt;
        }

        .y17 {
            bottom: 372.274704pt;
        }

        .y1e {
            bottom: 381.692011pt;
        }

        .y16 {
            bottom: 384.569369pt;
        }

        .y1c {
            bottom: 393.752012pt;
        }

        .y15 {
            bottom: 397.361361pt;
        }

        .y14 {
            bottom: 420.820012pt;
        }

        .y12 {
            bottom: 444.846705pt;
        }

        .y11 {
            bottom: 474.246709pt;
        }

        .y10 {
            bottom: 503.646713pt;
        }

        .yf {
            bottom: 533.046707pt;
        }

        .yd {
            bottom: 562.446701pt;
        }

        .y8 {
            bottom: 591.846701pt;
        }

        .y6 {
            bottom: 694.046703pt;
        }

        .y5 {
            bottom: 729.973358pt;
        }

        .y4 {
            bottom: 768.616027pt;
        }

        .y3 {
            bottom: 798.604023pt;
        }

        .y2 {
            bottom: 828.592040pt;
        }

        .y1 {
            bottom: 858.580036pt;
        }

        .h9 {
            height: 14.060000pt;
        }

        .h3 {
            height: 20.570667pt;
        }

        .h8 {
            height: 26.796875pt;
        }

        .h5 {
            height: 31.399999pt;
        }

        .h6 {
            height: 40.791667pt;
        }

        .h2 {
            height: 42.109375pt;
        }

        .h7 {
            height: 51.916667pt;
        }

        .h4 {
            height: 104.200002pt;
        }

        .h1 {
            height: 844.000000pt;
        }

        .h0 {
            height: 1122.533366pt;
        }

        .w6 {
            width: 39.800001pt;
        }

        .w7 {
            width: 49.266668pt;
        }

        .w8 {
            width: 58.666667pt;
        }

        .w3 {
            width: 125.933329pt;
        }

        .w4 {
            width: 148.666667pt;
        }

        .w2 {
            width: 332.466675pt;
        }

        .w5 {
            width: 456.399984pt;
        }

        .w1 {
            width: 609.333333pt;
        }

        .w0 {
            width: 793.733317pt;
        }

        .x1 {
            left: 8.200000pt;
        }

        .x3 {
            left: 15.296000pt;
        }

        .x5 {
            left: 33.845332pt;
        }

        .x6 {
            left: 51.816003pt;
        }

        .x7 {
            left: 55.533333pt;
        }

        .xc {
            left: 57.614668pt;
        }

        .x8 {
            left: 61.331999pt;
        }

        .x0 {
            left: 96.000000pt;
        }

        .xe {
            left: 120.000000pt;
        }

        .xf {
            left: 144.000000pt;
        }

        .xb {
            left: 301.632007pt;
        }

        .xd {
            left: 343.327991pt;
        }

        .xa {
            left: 394.080005pt;
        }

        .x9 {
            left: 417.126677pt;
        }

        .x2 {
            left: 425.800008pt;
        }

        .x4 {
            left: 549.733317pt;
        }

        .x10 {
            left: 562.199992pt;
        }

        .x11 {
            left: 599.999992pt;
        }

        .x12 {
            left: 647.266658pt;
        }
    }
</style>