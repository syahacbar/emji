    <body class="o-page" style="background-color:#fff;">
		<div id="page">
			<div id="header">
				<div class="header-content">
					<a href="#menu" class="p-link-home"><i class="fa fa-bars"></i></a>
					<a href="javascript:history.back();" class="p-link-back"><i class="fa fa-arrow-left"></i></a>
				</div>
				</div>
			</div>
			<div class="bannerPane banner-bg">
				<div class="overlay"></div>
				<div class="s-banner-content">
					Invoice
				</div>
			</div>
            <div id="content">
				<?php 
					$b=$data->row_array();
				?>
				<article>
					
					<div class="prod-single-content">
						<table style="border:none;padding:0px;font-size:3px;">
							<tr style="background-color:#fff;">
								<td>No Invoice</td>
								<td>:</td>
								<td><?php echo $b['inv_no']?></td>
							</tr>
							<tr style="background-color:#fff;">
								<td>Tanggal</td>
								<td>:</td>
								<td><?php echo $b['tanggal']?></td>
							</tr>
							<tr style="background-color:#fff;">
								<td>Customer</td>
								<td>:</td>
								<td><?php echo $b['inv_plg_nama']?></td>
							</tr>
							<?php if($b['inv_rek_id']=='COD'):?>
							<tr style="background-color:#fff;">
								<td>Pembayaran</td>
								<td>:</td>
								<td><?php echo $b['inv_rek_id']?></td>
							</tr>
							<?php else:?>
							<tr style="background-color:#fff;">
								<td>Pembayaran</td>
								<td>:</td>
								<td><?php echo 'Transfer Bank '.$b['inv_rek_bank']?></td>
							</tr>
							<tr style="background-color:#fff;">
								<td>No Rekening</td>
								<td>:</td>
								<td><?php echo $b['inv_rek_no']?></td>
							</tr>
							<tr style="background-color:#fff;">
								<td>Atas Nama</td>
								<td>:</td>
								<td><?php echo $b['inv_rek_nama']?></td>
							</tr>
							<?php endif;?>
							<tr style="background-color:#fff;">
								<td>Status Order</td>
								<td>:</td>
								<td><?php echo $b['inv_status']?></td>
							</tr>
						</table>
						<table style="width:100%;border:none;padding:0px;">
							<thead>
							<tr>
								<th style="text-align:center;">Menu</th>
								<th style="text-align:center;">Harga</th>
								<th style="text-align:center;">Porsi</th>
								<th style="text-align:center;">Subtotal</th>
							</tr>
							<thead>
							<tbody>
							<?php foreach ($data->result_array() as $a) {
								$menu=$a['detail_menu_nama'];
								$harga=$a['detail_harjul'];
								$porsi=$a['detail_porsi'];
								$subtotal=$a['detail_subtotal'];
							?>
								<tr>
									<td><?php echo $menu;?></td>
									<td style="text-align:center;"><?php echo number_format($harga);?></td>
									<td style="text-align:center;"><?php echo $porsi;?></td>
									<td style="text-align:center;"><?php echo number_format($subtotal);?></td>
								</tr>
							<?php } ?>
							</tbody>
							<tfoot>
								<tr>
									<td colspan="3">Total</td>
									<td style="text-align:center;"><?php echo number_format($b['inv_total'])?></td>
								</tr>
							</tfoot>
						</table>
	
						</form>
					</div>
					<div class="notifications info">
						<p style="text-align:justify;">Silahkan Print Screen Invoice Anda. Jika pembayaran melalui transfer bank, silahkan bayar sesuai dengan nominal yang tertera pada invoice.</p>
					</div>
				</article>

			</div>
        </div>
    </body>