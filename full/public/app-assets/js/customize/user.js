function validInfo(event, id_role_flg, id_khoa) {
    let role_flg = document.getElementById(id_role_flg).value;
    let khoa = document.getElementById(id_khoa).value;
    if (!role_flg) {
        event.preventDefault();
        Swal.fire({
            title: 'Lỗi!',
            text: 'Vui lòng chọn vai trò của người dùng này.',
            icon: 'error',
            confirmButtonColor: '#48CF85',
            confirmButtonText: 'Đóng',
        });
    }
    else if (!khoa){
        event.preventDefault();
        Swal.fire({
            title: 'Lỗi!',
            text: 'Vui lòng chọn khoa/ngành học người dùng này phụ trách.',
            icon: 'error',
            confirmButtonColor: '#48CF85',
            confirmButtonText: 'Đóng',
        });
    }
}

function filter(){
    document.filter_by_khoa.submit();
}
