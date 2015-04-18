$().ready(function(){

		//barang
			var kode;
			var kategori;
			var subkategori;
			var unit;
			var size;
			var namaB;
			var cprice;
			var presentase;
			var sprice;
			var minimum;
			var maximum;
			var stock;
			
		function kosong(){
			$("#barcode").val("");
			$("#kategori").val("");
			$("#subkategori").val("");
			$("#unit").val("");
			$("#size").val("");
			$("#nama_barang").val("");
			$("#cprice").val("");
			$("#persen").val("");
			$("#sprice").val("");
			$("#minimum").val("");
			$("#maximum").val("");
			$("#stock").val("");
			
			$("#tb_barang").load("proses/tb_barang.php","q=tampilData");
		}
		$("#tamsup").click(function(){
			$("#tamsup").attr("disabled",true);
			$("#editsup").attr("disabled",false);
		});
		
		//load tabel
		$("#tb_barang").load("proses/tb_barang.php","q=tampilData");
		
		//load kategori
		$("#kategori").load("proses/tb_barang.php","q=ambilKategori");
		
		//kategori dipilih
		$("#kategori").change(function(){
			var id = $("#kategori").val();
			$.ajax({
				url: 'proses/tb_barang.php',
				data: 'q=pilihKategori&id='+id,
				cache: false,
				success: function(data){
					$("#subkategori").html(data);
				}
			});
		});
		//input barang
		$("#formBarang").submit(function(){
			$.ajax({
				type: 'POST',
				url: 'proses/proses.php',
				data: $(this).serialize(),
				success: function(msg){
					if(msg == "sukses"){
						alert("Proses data berhasil");
						kosong();
						exit();
						//die();
					}else{
						alert("Error...");
						kosong();
						exit();
						//die();
					}
				}
			});
			return false;
		});
		//end barang
});
