flatpickr('.task-due-date', {
    enableTime: true,
    dateFormat: "d/m/Y H:i",
    time_24hr: true,
    minDate: "today",
    locale: 'vn'
});



function endtime_valid(event, time_content_id, start_time_id, end_time_id) {
    let start_time = document.getElementById(start_time_id).value;
    let end_time = document.getElementById(end_time_id).value;
    let time_content = document.getElementById(time_content_id).value;
    if (!start_time && time_content) {
        event.preventDefault();
        Swal.fire({
            title: 'Lỗi!',
            text: 'Vui lòng chọn thời gian bắt đầu đợt xét duyệt này.',
            icon: 'error',
            confirmButtonColor: '#48CF85',
            confirmButtonText: 'Đóng',
        })
    }
    if (!end_time && time_content) {
        event.preventDefault();
        Swal.fire({
            title: 'Lỗi!',
            text: 'Vui lòng chọn thời gian kết thúc đợt xét duyệt này.',
            icon: 'error',
            confirmButtonColor: '#48CF85',
            confirmButtonText: 'Đóng',
        })
    }
    if (end_time && time_content) {
        end_time += ':00';
        end_time = strToDate(end_time);
        if (end_time < new Date()) {
            event.preventDefault();
            Swal.fire({
                title: 'Lỗi!',
                text: 'Thời gian kết thúc không hợp lệ.',
                icon: 'error',
                confirmButtonColor: '#48CF85',
                confirmButtonText: 'Đóng',
            })
        }
    }
    let end_date1 = document.getElementById('end_time').value;
    if (end_date1 && time_content && start_time) {
        start_time += ':00';
        end_date1 += ':00';
        start_time = strToDate(start_time);
        end_date1 = strToDate(end_date1);
        if (end_date1 < start_time) {
            event.preventDefault();
            Swal.fire({
                title: 'Lỗi!',
                text: 'Thời gian kết thúc không được lớn hơn thời gian bắt đầu.',
                icon: 'error',
                confirmButtonColor: '#48CF85',
                confirmButtonText: 'Đóng',
            })
        }
    }
}

function strToDate(dtStr) {
    if (!dtStr) return null
    let dateParts = dtStr.split("/");
    let timeParts = dateParts[2].split(" ")[1].split(":");
    dateParts[2] = dateParts[2].split(" ")[0];
    // month is 0-based, that's why we need dataParts[1] - 1
    return dateObject = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0], timeParts[0], timeParts[1], timeParts[2]);
}

function delete_time(delete_domain) {
    Swal.fire({
        title: 'Chú ý, bạn không thể hoàn tác hành động này!',
        text: "Xoá đợt xét duyệt này sẽ xoá toàn bộ dữ liệu liên quan. Bạn có chắc chắn xoá không?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Có, Xoá!',
        cancelButtonText: 'Huỷ'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = delete_domain;
        }
    })
}