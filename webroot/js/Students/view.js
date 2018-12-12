function hello() {
	let status = ($('input[name="chkInternship"]')[0].checked) ? 1 : 0;
	let student_id = $('#student-id').val();
	let pre_url  = urlSaveChk + "?status=" + status + "&id=" + student_id;
	$.ajax({
		type: 'PATCH',
		url: pre_url,
		 headers: {
                'X-CSRF-Token': csrfToken
            },
        success: function (res) {
            console.log(res);
        },
        error: function (e) {
        	console.log(e);
        }

	})
}