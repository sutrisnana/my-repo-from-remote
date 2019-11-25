$(function () {
	$(".ModalUbah").on("click", function () {
		$("#newMenuModalLabel").html("Ubah Data User");
		document.getElementById("btnSubmit").style.visibility = "visible";
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-body form").attr(
			"action",
			"http://10.0.0.23/ci-assetit/menu/ubahMenu"
		);

		const id = $(this).data("id");
		$.ajax({
			url: "http://10.0.0.23/ci-assetit/menu/getubah",
			data: {
				id: id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#id").val(data.id);
				$("#menu").val(data.menu);
			}
		});
	});
});

$(function () {
	$(".modalUbahSubmenu").on("click", function () {
		$("#newSubMenuModalLabel").html("Ubah Data Submenu");
		document.getElementById("btnSubmit").style.visibility = "visible";
		$(".modal-footer button[type=submit]").html("Ubah Data");
		$(".modal-body form").attr(
			"action",
			"http://10.0.0.23/ci-assetit/menu/ubahSubmenu"
		);

		const id = $(this).data("id");
		$.ajax({
			url: "http://10.0.0.23/ci-assetit/menu/getUbahSubmenu",
			data: {
				id: id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#menu_id").val(data.menu_id);
				$("#title").val(data.title);
				$("#url").val(data.url);
				$("#icon").val(data.icon);
				$("#is_active").val(data.is_active);
				$("#id").val(data.id);
			}
		});
	});
});

$(function () {
	$(".UbahUser").on("click", function () {
		$("#modalUbahUserLabel").html("Ubah Data User");
		document.getElementById("btnSubmit").style.visibility = "visible";
		$(".modal-footer button[type=submit]").html("Ubah Data");

		const id = $(this).data("id");
		$.ajax({
			url: "http://10.0.0.23/ci-assetit/user/getUbahUser",
			data: {
				id: id
			},
			method: "post",
			dataType: "json",
			success: function (data) {
				$("#userid").val(data.user_id);
				$("#name").val(data.name);
				$("#username").val(data.user_name);
				$("#image").val(data.image);
				$("#roleid").val(data.role_id);
				$("#isactive").val(data.is_active);
			}
		});
	});
});

$(function () {
	$(".pilihPart").on("click", function () {
		const id = $("#part_id").val();
		$.ajax({
			url: "http://10.0.0.23/ci-assetit/Partit/getPartName",
			data: {
				id: id
			},

			method: "post",
			dataType: "json",
			success: function (data) {
				//console.log(data.part_name)
				$("#partname").val(data.part_detail);
				$("#bpp").val(data.bpp_number);
				$("#receiptdate").val(data.receipt_date);
				$("#partid").val(data.part_id);
				$("#id_ax").val(data.item_id_ax);
				$("#partqty").val(data.part_qty);
			}
		});
		$("#modalAddPart").modal("hide");
	});
});

$(function () {
	$("#idpc_perbaikan").on("change", function () {
		//Ambil value dari combo yg diselect
		var comboid = $(this).val();

		$.ajax({
			url: "http://10.0.0.23/ci-assetit/Assetit/getPC",
			data: {
				id: comboid
			},

			method: "post",
			dataType: "json",
			success: function (data) {
				$("#user").val(data.user);
				//console.log(data.user)
			}
		});
	});
});

$(function () {
	$(".detailHistory").on("click", function () {
		$("#modalDetailPartLabel").html("Detail Pemakaian Part");
		const id = $(this).data("id");
		//onsole.log(id);

		$.ajax({
			url: "http://10.0.0.23/ci-assetit/Assetit/getHistoryById",
			data: {
				id: id
			},

			method: "post",
			dataType: "json",
			success: function (data) {
				//console.log(data.part_name)
				$("#bpp").val(data.nomor_bpp);
				$("#receiptdate").val(data.part_receipt);
				$("#partqty").val(data.part_qty);
				$("#part_note").val(data.part_note);
				$("#itemidax").val(data.part_id_ax);
			}
		});
	});
});

/*$(function () {

	//const part_id = $('#tipe').val();

	if ($('#tipe').val() !== 'Hardware') {
		//document.getElementById("btnDetailPart").style.visibility = "hidden";
		//$(".badge button").style.visibility = "hidden";
	}
	console.log($('#tipe').val())
});*/


$(function () {
	$(".detailAplikasi").on("click", function () {
		$("#modalDetailAplikasiLabel").html("Aplikasi Yang Terinstal");
		const id = $(this).data("id");
		console.log(id);

		$.ajax({
			url: "http://10.0.0.23/ci-assetit/Assetit/detailAplikasi",
			data: {
				id: id
			},

			method: "post",
			dataType: "json",
			success: function (data) {
				console.log(data);
				var table_header = "<table class='table table-striped table-bordered'><tr><tr></tr></thead><tbody>";
				var table_footer = "</tbody></table>";
				var html = "";

				data.forEach(function (element) {
					html += "<tr><td>" + element.nama_aplikasi + "</td></tr>";
				});

				var all = table_header + html + table_footer;
				$('#salle_list').html(all);
				$('#modalDetailAplikasi').modal('show');
			}
		});
	});
});
