flatpickr('#end_time',{
    enableTime: true,
    dateFormat: "d/m/Y H:i",
    time_24hr: true,
    minDate: "today",
    locale: 'vn'
});

function endtime_valid(event) {
    let end_time = document.getElementById('end_time').value;
    let time_content = document.getElementById('time_content').value;
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
    if(end_time && time_content) {
        end_time += ':00';
        end_time = strToDate(end_time);
        if(end_time < new Date()){
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


    function strToDate(dtStr) {
        if (!dtStr) return null
        let dateParts = dtStr.split("/");
        let timeParts = dateParts[2].split(" ")[1].split(":");
        dateParts[2] = dateParts[2].split(" ")[0];
        // month is 0-based, that's why we need dataParts[1] - 1
        return dateObject = new Date(+dateParts[2], dateParts[1] - 1, +dateParts[0], timeParts[0], timeParts[1], timeParts[2]);
      }
}
