$(function () {
	
	const table = $('table').DataTable({
		serverSide: true,
		processing: true,
		ajax: {
			url: ajaxUrl,
			type: 'post',
			data: {
				_token: csrf
			}
		},
		columns: [
			{ data: 'DT_RowIndex' },
			{ data: 'name' },
			{ data: 'user.name' },
			{ data: 'date' },
			{
				data: 'action',
				orderable: false,
				searchable: false,
			}
		]
	})

	$('tbody').on('click', 'button', function () {
		if (confirm('Are You Sure?')) {
			const id = table.row($(this).parents('tr')).data().id
			const url = deleteUrl.replace(':id', id)

			$.ajax({
				url: url,
				type: 'post',
				data: {
					_token: csrf,
					_method: 'DELETE'
				},
				success: res => {
					$('#alert').html(`<div class="alert alert-success alert-dismissible">
						${res}
						<button class="close" data-dismiss="alert">&times;</button>
					</div>`)
					table.ajax.reload()
				}
			})
		}
	})

})