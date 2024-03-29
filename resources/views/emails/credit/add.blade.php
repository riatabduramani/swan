<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>New invoice generated</title>
    
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }
    
    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }
    
    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }
    
    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }
    
    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }
    
    .invoice-box table tr.heading td{
        background:#eee;
        border-bottom:1px solid #ddd;
        font-weight:bold;
    }
    
    .invoice-box table tr.details td{
        padding-bottom:20px;
    }
    
    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }
    
    .invoice-box table tr.item.last td{
        border-bottom:none;
    }
    
    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }

    .label-success {
    	background-color: #2ab27b;
	}

	.label-danger {
    	background-color: red;
	}

	.label-warning {
    	background-color: yellow;
	}

	.label {
	    display: inline;
	    padding: .2em .6em .3em;
	    font-size: 75%;
	    font-weight: 700;
	    line-height: 1;
	    color: #fff;
	    text-align: center;
	    white-space: nowrap;
	    vertical-align: baseline;
	    border-radius: .25em;
	}
    
    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }
        
        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="{{ config('app.url')}}/images/swan-logoh.png" style="width:100%; max-width:300px;">
                            </td>
                            
                            <td>
                                Created: {{ date('d.m.Y',strtotime($date)) }}<br>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                {{ $settings->company_name }}<br>
                                {{ $settings->address }}
                            </td>
                            <td>
                                {{ $name }} {{ $surname }}<br>
                                {{ $address }}<br>
                                {{ $postal }} {{ $city }}, {{ $country }}<br />
                                {{ $email }}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            
            
            <tr class="heading">
                <td>
                    Credit Description
                </td>
                
                <td>
                    Sum
                </td>
            </tr>
                        
            <tr class="item last">

                <td>
                    {{ $notes }}
                </td>
                
                <td>{{ $amount }}&euro;</td>
            </tr>
            
        </table>
    </div>
</body>
</html>