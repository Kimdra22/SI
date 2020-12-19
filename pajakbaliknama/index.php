<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Latihan AJAX</title>
	
    <!-- Jquery Mobile -->
    <link rel="stylesheet" type="text/css" href="pjk.css">
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
    <style>
		@media (min-width: 770px) {
			#main{
				width: 50%;
				margin: auto;
			}
		}
    </style>
	
    <!-- jQuery  -->
    <script src="jquery.js"></script>
</head>
<body>
	<div data-role="page" class="jqm-demos jqm-home">		
		<div id="main" class="letak" role="main" class="ui-content">						
			<div id="result" style="display: none">
			  
			</div>
			
			<div id="pencarian">
			  <h3 class="ui-bar ui-bar-a ui-corner-all">Form Pencarian</h3>
			  <div class="ui-body ui-body-a ui-corner-all">
				<form id="form-pencarian" action="get_hobi.php" method="post">
					<label for="search-1">Masukkan nomor pelat kendaraan:</label>
					<input name="nama" id="nama" value="" placeholder="Cari nomor pelat kendaraan . . . " type="search">
					<input value="C A R I" data-theme="a" type="submit">
				</form>
			  </div>
			</div>
		</div>
	</div>

<div id = "form_edit" style="display: none"> 
 <form id = "thisForm" action="input.php" method="POST">
		<!--nama nomor pelat kendaraan-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">pelat nomor kendaraan</span>
			</div>
			<input type="text" class="form-control" id="pk"  name="pk" placeholder="masukan pelat nomor kendaraan" readonly>
		</div>

		<!--nama pemilik baru-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon1">Nama pemilik baru</span>
			</div>

			<input type="text" class="form-control" id="NamaPemilikBaru"  name="pemilik" placeholder="masukan nama pemilik baru" required>
		</div>

		<!--Inputan nomor KTP-->
		<div class="input-group mb-3">
		
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"> Masukkan Nomor KTP anda </span>
		</div>
			<input type="number" class="form-control" id="NomorKtp" name="ktp" placeholder="masukan Nomor ktp" required>
		</div>

		<!--Inputan nomor STNK-->
		<div class="input-group mb-3">
			<div class="input-group-prepend">
				<span class="input-group-text" id="basic-addon1"> Masukkan Nomor STNK anda </span>
			</div>
			<input type="number" class="form-control" id="Nomorstnk" name="stnk" placeholder="masukan Nomor stnk" required>
		</div>
												
		<!--Inputan nomor BPKB-->
		<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text" id="basic-addon1"> Masukkan nomor BPKB </span>
		</div>
			<input type="number" class="form-control" id="NomorBpkb"  name="bpkb" placeholder="masukan Nomor Bbkb" required>
		</div>

	<!--input scan KTP-->
		<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text" id="inputGroupFileAddon01">Scan KTP</span>
		</div>
		<div class="custom-file">
			<input type="file" class="custom-file-input" id="scktp" name="scktp" aria-describedby="inputGroupFileAddon01" required>
			<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
		</div>
		</div>

	<!--input scan STNK-->
		<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text" id="inputGroupFileAddon01">Scan STNK</span>
		</div>
		<div class="custom-file">
			<input require type="file" class="custom-file-input" id="scstnk" name="scstnk" aria-describedby="inputGroupFileAddon01" required>
			<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
		</div>
		</div>

	<!--input scan BPKB-->
		<div class="input-group mb-3">
		<div class="input-group-prepend">
			<span class="input-group-text" id="inputGroupFileAddon01">Scan BPKB</span>
		</div>
		<div class="custom-file">
			<input require type="file" class="custom-file-input" id="scbpkb" name="scbpkb" aria-describedby="inputGroupFileAddon01" required>
			<label class="custom-file-label" for="inputGroupFile01">Choose file</label>
		</div>
		</div>

		<!--Submit,Reset-->
		<center><button type="submit" class="btn btn-primary">perbaharui</button>
		</center>
 </form>
</div>
		
            <center>
            <div id="footer">
                <div class="letakft">
                    Copyright BOBYRAMA<br>
                    2018
                </div>
            </div>
            </center>
</div>


	<script type='text/javascript'>
		var temp;	
		$(document).ready(function (){
						
			$('#form-pencarian').submit(function(event) {
				/* stop form from submitting normally */
				event.preventDefault();
				
				$('#result').html('');
				
				var url = $(this).attr('action');
				
				$.ajax({
					type:$(this).attr('method'),
					url:url,
					data:$(this).serialize(),
					success: function(data){
						//alert(data);
						if (data == null){
							$('#result').html('Data tidak ditemukan');
						}else{
							$('#result').html(data);
							$(".updateData").click(function(){
								$.get("get_data.php?pk=" + $("#nama").val(), function(data){
									data = JSON.parse(data)[0];
									$('#pk').val(data.pk);
									$('#NamaPemilikBaru').val(data.pemilik);
									$('#NomorKtp').val(data.ktp);
									$('#Nomorstnk').val(data.stnk);
									$('#NomorBpkb').val(data.bpkb);
									$('#form_edit').show();
								});
							});
						}
						$('#result').show();
					}
				});
				return null;
			});

			$('#thisForm').submit(function(e){
				e.preventDefault();
				var pk = $('#pk').val();
				var pemilik = $('#NamaPemilikBaru').val();
				var ktp = $('#NomorKtp').val();
				var stnk = $('#Nomorstnk').val();
				var bpkb = $('#NomorBpkb').val();
				var scktp = $("#scktp").val().split("\\")[$('#scktp').val().split("\\").length - 1];
				var scstnk = $("#scstnk").val().split("\\")[$('#scstnk').val().split("\\").length - 1];
				var scbpkb = $("#scbpkb").val().split("\\")[$('#scbpkb').val().split("\\").length - 1];


				$.post("input.php", {
					pk: pk, 
					pemilik: pemilik, 
					ktp: ktp, 
					stnk: stnk, 
					bpkb: bpkb, 
					scktp: scktp, 
					scstnk: scstnk, 
					scbpkb: scbpkb
					}, function(data){
					alert(data);
				})
			});
		});
		
	</script>
</body>
</html>