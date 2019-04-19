<html>
    <head>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    </head>
    <body>
<style type="text/css">

	
	table td, table th{
		border:1px solid black;
	}
	
	body{
		font-family: DejaVu Sans;

	}
	
</style>
<div class="container">


	<br/>
	<a href="{{ route('pdfview',['download'=>'pdf']) }}">Download PDF</a>


	<table>
	 <tr>
        <td class="title">
        </td>

        <td style="direction: rtl; text-align: right;">
            رقم الفاتوره #: {{$getproducts[0]->order_id}}<br>
            التاريخ: {{$getproducts[0]->created_at}}<br>

        </td>
    </tr>
	
		<tr>
			<td>5</td>
			<td > فثقفثف</td>
			<td>قثفقثفثقفثقفثقف}</td>
		</tr>

	</table>
</div>
</body>
</html>
