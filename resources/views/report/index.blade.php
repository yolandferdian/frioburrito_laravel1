<form method="post">
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="date" class="form-control" name="tglm" required value="<?php echo $tgl_mulai ?>">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="date" class="form-control" name="tgls" required value="<?php echo $tgl_selesai ?>">
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label>Status</label>
				<select class="form-control" name="status">
					<option value="">Pilih Status</option>
					<option value="pending" <?php echo $status =="pending"?"selected":""; ?> >pending</option>
					<option value="sudah kirim pembayaran" <?php echo $status =="sudah kirim pembayaran"?"selected":""; ?> >sudah kirim pembayaran</option>
					<option value="Lunas" <?php echo $status =="Lunas"?"selected":""; ?> >Lunas</option>
					<option value="Burrito Meluncur" <?php echo $status =="Burrito Meluncur"?"selected":""; ?> >Burrito Meluncur</option>
					<option value="Sudah Diterima" <?php echo $status =="Sudah Diterima"?"selected":""; ?> >Sudah Diterima</option>
					<option value="Batal" <?php echo $status =="Batal"?"selected":""; ?> >Batal</option>
				</select>
			</div>
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label><br>
			<button class="btn btn-primary" name="kirim">Lihat</button>
		</div>
	</div>
</form>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
			<th>Jumlah</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $total=0; ?>
		<?php foreach ($semuadata as $key => $value): ?>
		<?php $total+=$value['total_pembelian'] ?>
		<tr>
			<td><?php echo $key+1; ?></td>
			<td><?php echo $value["nama_pelanggan"] ?></td>
			<td><?php echo date("d F Y",strtotime($value["tanggal_pembelian"])) ?></td>
			<td>Rp. <?php echo number_format($value["total_pembelian"]) ?></td>
			<td><?php echo $value["status_pembelian"] ?></td>
		</tr>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Total</th>
			<th>Rp. <?php echo number_format($total) ?></th>
			<th></th>
		</tr>
	</tfoot>
</table>