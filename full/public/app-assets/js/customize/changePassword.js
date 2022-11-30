function changePassword(event){
    let oldPass = document.getElementById('new_password').value;
    let newPass = document.getElementById('new_password_confirm').value;
    if(oldPass && newPass){
        if(oldPass.length < 6){
            event.preventDefault();
            Swal.fire({
                title: 'Lỗi!',
                text: 'Mật khẩu không được ít hơn 6 kí tự.',
                icon: 'error',
                confirmButtonColor: '#48CF85',
                confirmButtonText: 'Đóng',
            })
        }

        else if(oldPass.length > 40){
            event.preventDefault();
            Swal.fire({
                title: 'Lỗi!',
                text: 'Mật khẩu không được nhiều hơn 40 kí tự.',
                icon: 'error',
                confirmButtonColor: '#48CF85',
                confirmButtonText: 'Đóng',
            })
        }

        else if(oldPass != newPass){
            event.preventDefault();
            Swal.fire({
                title: 'Lỗi!',
                text: 'Vui lòng đảm bảo bạn đã nhập cùng một mật khẩu.',
                icon: 'error',
                confirmButtonColor: '#48CF85',
                confirmButtonText: 'Đóng',
            })
        }
    }
}
