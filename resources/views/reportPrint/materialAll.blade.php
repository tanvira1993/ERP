<?php
echo '<pre>';
// print_r($result);
echo '</pre>';


?>

<!DOCTYPE html>
<html>
<head>
	<title>Material Report</title>
	<link rel="stylesheet" href="http://127.0.0.1:8000/frontend/bootstrap.min.css">

	<div class="row">
		<div class="col-md-5">			
		</div>
		<div class="col-md-2">
			<img src="http://127.0.0.1:8000/frontend/toma.jpg" alt="toma_group" width="105" height="100">
		</div>

		
		<div class="col-md-5">			
		</div>
	</div>
	<style type="text/css">
	@media print
	{    
		.no-print
		{
			display: none !important;
		}
	}

</style>
</head>
<body lang=EN-US>
	<div style="margin-top:20px;" class="WordSection1">
		<tr class="no-print ">
			<td style="margin:0 auto;" colspan="7">
				<button style="margin-left: 48%;" type="button" class="no-print" onclick="print()">Print</button>
			</td>
		</tr>

		<table class="MsoNormalTable" border=0 cellspacing=0 cellpadding=0 width=720 style='width:562.5pt;margin:0 auto;border-collapse:collapse'>
			<tr style='height:27.0pt'>
				<td width=750 colspan=7 style='width:562.5pt;padding:0in 5.4pt 0in 5.4pt; height:27.0pt'>
					<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;text-align:center;line-height:normal'><b>
						<span style='font-size:16.0pt'>Material Report</span></b>
					</p>
				</td>
				<td style='height:27.0pt;border:none' width=0 height=36></td>
			</tr>

			<tr style='height:27.0pt'>
				<td style='height:15.75pt;border:none' width=0 height=21></td>
			</tr>

			<tr style='height:15.75pt'>
				<td width=350  style='width:301.5pt;border-top:none;border-left:
				solid 1.0pt;border-bottom:none;border-right:solid black 1.0pt;
				padding:0in 5.4pt 0in 5.4pt;height:15.75pt'>
				<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
				text-align:center;line-height:normal'><span style='font-size:12.0pt'>Material Name</span></p>
			</td>

			<td width=50  style='width:301.5pt;border-top:none;border-left:
			solid 1.0pt;border-bottom:none;border-right:solid black 1.0pt;
			padding:0in 5.4pt 0in 5.4pt;height:15.75pt'>
			<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
			text-align:center;line-height:normal'><span style='font-size:12.0pt'>Receive Qty.</span></p>
		</td>
		<td width=150  style='width:73.45pt;border:none;border-right:solid 1.0pt;
		padding:0in 5.4pt 0in 5.4pt;height:15.75pt'>
		<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
		text-align:center;line-height:normal'><span style='font-size:12.0pt'>Consume Qty.</span></p>
	</td>

	<td width=150  style='width:73.45pt;border:none;border-right:solid 1.0pt;
	padding:0in 5.4pt 0in 5.4pt;height:15.75pt'>
	<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
	text-align:center;line-height:normal'><span style='font-size:12.0pt'>Scrap Qty.</span></p>
</td>
<td width=150  style='width:73.45pt;border:none;border-right:solid 1.0pt;
padding:0in 5.4pt 0in 5.4pt;height:15.75pt'>
<p class=MsoNormal align=center style='margin-bottom:0in;margin-bottom:.0001pt;
text-align:center;line-height:normal'><span style='font-size:12.0pt'>Stock Qty.</span></p>
</td>

<td style='height:15.75pt;border:none' width=0 height=21></td>
</tr>





<tr style='height:15.75pt'>
	<td width=350  style='width:301.5pt;border:solid 1.0pt;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.75pt'>
		<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:normal'>
			<span style='font-size:12.0pt'><?php if($result['current']!=null){echo $result['current'][0]->name ;} else{echo 'No Transition yet';}?></span>
		</p>
	</td>
	<td width=50  style='width:301.5pt;border:solid 1.0pt;border-right:solid black 1.0pt;padding:0in 5.4pt 0in 5.4pt;height:15.75pt'>
		<p class=MsoNormal style='margin-bottom:0in;margin-bottom:.0001pt;line-height:normal'>
			<span style='font-size:12.0pt'><?php if($result['allRcv']!=null){echo $result['allRcv'][0]->q ;} else {echo 0;}?></span>
		</p>
	</td>
	<td width=150  style='width:73.45pt;border:solid 1.0pt;border-left: none;padding:0in 5.4pt 0in 5.4pt;height:15.75pt'>
		<p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;text-align:right;line-height:normal'>
			<span style='font-size:12.0pt'><?php if($result['consume']!=null){echo $result['consume'][0]->q ;} else{echo 0;}?></span>
		</p>
	</td>

	<td width=150  style='width:73.45pt;border:solid 1.0pt;border-left: none;padding:0in 5.4pt 0in 5.4pt;height:15.75pt'>
		<p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;text-align:right;line-height:normal'>
			<span style='font-size:12.0pt'><?php if($result['scrap']!=null){echo $result['scrap'][0]->q ;} else{ echo 0;}?></span>
		</p>
	</td>
	<td width=150  style='width:73.45pt;border:solid 1.0pt;border-left: none;padding:0in 5.4pt 0in 5.4pt;height:15.75pt'>
		<p class=MsoNormal align=right style='margin-bottom:0in;margin-bottom:.0001pt;text-align:right;line-height:normal'>
			<span style='font-size:12.0pt'><?php if($result['current']!=null){echo $result['current'][0]->q ;} else{ echo 0;}?></span>
		</p>
	</td>



	<td style='height:15.75pt;border:none' width=0 height=21></td>
</tr>



</table>
</div>

</body>
</html>
