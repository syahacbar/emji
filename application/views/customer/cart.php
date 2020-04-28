	<!-- Start header -->
	<div class="all-page-title page-breadcrumb">
		<div class="container text-center">
			<div class="row">
				<div class="col-lg-12">
					<h1>Keranjang Pesanan</h1>
				</div>
			</div>
		</div>
	</div>
	<!-- End header -->
	<!-- Start About -->
	<div class="menu-box">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 text-center">
					<div class="inner-column">
						<table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Menu</th>
                                    <th>Jumlah</th>
                                    <th>Sub Total</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <form action="<?php echo base_url().'menu/update/'?>" method="post">
                            <?php 
                                $i = 1; 
                                foreach ($this->cart->contents() as $items): 
                                    echo form_hidden($i.'[rowid]', $items['rowid']);
                            ?>
                                <tr>
									<td><?php echo $items['name'];?></td>
									<td style="padding:0px;width:15%"><input class="form-control" type="number" name="<?php echo $i.'[qty]'?>" value="<?php echo number_format($items['qty']);?>" min="1"></td>
									<td style="text-align:center;"><?php echo number_format($items['subtotal']);?></td>
									<td style="text-align:center;"><a href="<?php echo base_url().'menu/remove/'.$items['rowid'];?>" style="text-decoration:none;">X</a></td>
								</tr>
							<?php $i++; ?>
							<?php endforeach; ?>
							</tbody>
							<tfoot>
								<tr>
									<th style="text-align:left;" colspan="2">Total</th>
									<th style="text-align:center;"><?php echo number_format($this->cart->total());?></th>
									<th></th>
								</tr>
							</tfoot>
						</table>
                        <button type="submit" class="btn btn-lg btn-circle btn-outline-new-white"><i class="fa fa-pencil-square"></i> Update Keranjang</button>
						<a href="<?php echo base_url().'menu/check_out'?>" style="text-decoration:none;" class="btn btn-lg btn-circle btn-outline-new-white"><i class="fa fa-credit-card"></i> Check Out</a>
						</form>
					</div>
				</div>
				<div class="col-lg-6 col-md-6">
					<img src="" alt="" class="img-fluid">
                </div>
            </div>
		</div>
	</div>
	<!-- End About -->