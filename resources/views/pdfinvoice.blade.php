<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    
    <style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        #border:1px solid #eee;
        box-shadow:0 0 10px rgba(0, 0, 0, .15);
        font-size:12px;
        line-height:18px;
        font-family:'dejavu sans', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }
    
    .invoice-box table{
        width:100%;
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
                                <img src="{{ config('app.url')}}/images/swan-logoh.png" style="width:300px;">
                            </td>
                            
                            <td>
                                Фатура #: {{ $nr }} / {{ date('Y',strtotime($date)) }}<br>
                                Креирано: {{ date('d.m.Y',strtotime($date)) }}<br>
                                @if($status == 2)
                                До: {{ date('d.m.Y',strtotime($due)) }}<br />
                                @endif
                                Тип: @if($type == 2) Custom @else Packet @endif
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
                                <b>Од:</b><br />
                                {{ $settings->company_name }}<br>
                                {{ $settings->address }}<br />
                                Даночен бр.: {{ $settings->tax }}
                            </td>
                            <td>
                                <b>До:</b><br />
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
                 <td>Статус на плаќање</td>
                 <td>Начин на плаќање</td>
            </tr>
            
            <tr class="details">
                <td>
                    {!! $invoice->showPaidStatus($invoice) !!}
                </td>
                
                <td>
                    {!! $invoice->showPaidMethod($invoice) !!}
                </td>
            </tr>
            
            <tr class="heading">
                <td>
                    Услуга
                </td>
                
                <td>
                    Шена
                </td>
            </tr>
                        
            <tr class="item last">

                <td>
                @if($type == 2)
                {{ $title }}
                @else
                 {{ $packetname }}
                @endif
                	<p style="font-size: 10pt"><i>{!! $description !!}</i></p>
                </td>
                
                <td>{{ number_format( round($total_sum * env('CURRENCY')),2,",",".") }} МКД</td>
            </tr>
            
            <tr>
            	@if($notes)
               
                  <td>
                <tr class="total" style="text-align: right">
                    <td>Вкупно:</td>
                    <td>{{ number_format( round($total_sum * env('CURRENCY')),2,",",".") }} МКД</td>
                </tr>
                <tr class="total" style="text-align: right">
                    <td>ДДВ {{ env('VAT')* 100 }}%:</td>
                    <td>{{ number_format( round(($total_sum * env('CURRENCY')) * env('VAT') ),2,",",".") }} МКД</td>
                </tr>
                <tr class="total" style="text-align: right">
                    <td>Вкупно со ДДВ:</td>
                    <td>{{ number_format( round((($total_sum * env('CURRENCY')) * env('VAT')) + ($total_sum * env('CURRENCY'))),2,",",".") }} МКД</td>
                </tr>
                </td>
                 <td style="margin-top: 15px;">
                    <b>Опис:</b>
                    <div style="border:1px solid #eee; font-size: 9pt; padding: 6px;">
                        <p>{{ $notes }}</p>
                    </div>
                </td>

                @else
                <td></td>
                <td>
                <tr class="total" style="text-align: right">
                    <td>Вкупно:</td>
                    <td>{{ number_format( round($total_sum * env('CURRENCY')),2,",",".") }} МКД</td>
                </tr>
                <tr class="total" style="text-align: right">
                    <td>ДДВ {{ env('VAT')* 100 }}%:</td>
                    <td>{{ number_format( round(($total_sum * env('CURRENCY')) * env('VAT') ),2,",",".") }} МКД</td>
                </tr>
                <tr class="total" style="text-align: right">
                    <td>Вкупно со ДДВ:</td>
                    <td>{{ number_format( round((($total_sum * env('CURRENCY')) * env('VAT')) + ($total_sum * env('CURRENCY'))),2,",",".") }} МКД</td>
                </tr>
                </td>
                @endif
            </tr>
        </table>
    </div>
</body>
</html>