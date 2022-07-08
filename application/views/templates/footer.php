<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; Masjid Jami' Al-Hidayah <?= date('Y'); ?></span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Keluar</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">apakah anda yakin ingin keluar?</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				<a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Keluar</a>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/js/Chart.min.js"></script>
<script src="<?= base_url('assets/'); ?>vendor/js/core.min.js"></script>


<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

<script>
	$('.custom-file-input').on('change', function() {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);
	});
	$('.form-check-input').on('click', function() {
		const menuId = $(this).data('menu');
		const roleId = $(this).data('role');
		$.ajax({
			url: "<?= base_url('admin/changeaccess'); ?>",
			type: 'post',
			data: {
				menuId: menuId,
				roleId: roleId
			},
			success: function() {
				document.location.href = "<?= base_url('admin/roleaccess/'); ?>" + roleId;
			},
		});
	});
</script>
<script>
	$("#id_kategori").change(function() {
		const $this = $(this);
		const saldo = $this.find(':selected').data('saldo'); // Get data value
		$('#saldo').val(saldo);
	});
</script>
<script>
	function rupiah(numb) {
		return 'Rp. ' + (Number(numb)).toLocaleString('id-ID', {
			style: 'decimal',
			maximumFractionDigits: 2,
			minimumFractionDigits: 2
		});
	}
</script>
<script>
	$(function() {
		var ctx = document.getElementById("sumber-kas").getContext("2d");
		var json_url = baseURI + "/admin/get-sumber-kas";

		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: [],
				datasets: [{
					label: "Sumber Kas Masjid",
					fill: false,
					lineTension: 0.1,
					backgroundColor: "rgba(75,192,192,0.4)",
					borderColor: "rgba(75,192,192,1)",
					borderCapStyle: 'butt',
					borderDash: [],
					borderDashOffset: 0.0,
					borderJoinStyle: 'miter',
					pointBorderColor: "rgba(75,192,192,1)",
					pointBackgroundColor: "#fff",
					pointBorderWidth: 1,
					pointHoverRadius: 5,
					pointHoverBackgroundColor: "rgba(75,192,192,1)",
					pointHoverBorderColor: "rgba(220,220,220,1)",
					pointHoverBorderWidth: 2,
					pointRadius: 1,
					pointHitRadius: 50000,
					data: [],
					spanGaps: false,
				}]
			},
			options: {
				tooltips: {
					mode: 'index',
					intersect: false
				},
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero: true,
							stepSize: 500000
						}
					}]
				}
			}
		});

		ajax_chart(myChart, json_url);

		function ajax_chart(chart, url, data) {
			var data = data || {};

			$.getJSON(url, data).done(function(response) {
				chart.data.labels = response.labels;
				chart.data.datasets[0].data = response.data.jumlah;
				chart.update();
			});
		}
	});
</script>
<script>
	$("#nama_barang").change(function() {
		const $this = $(this);
		const stok = $this.find(':selected').data('stok'); // Get data value
		$('#stok_barang').val(stok);
	});
</script>

</body>

</html>