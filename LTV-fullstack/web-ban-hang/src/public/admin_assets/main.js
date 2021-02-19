function actionDelete(event) {
    event.preventDefault();
    const urlRequest = $(this).data('url');
    const title = $(this).data('title');
    const that = $(this);

    Swal.fire({
        title: `Xác nhận xóa ${title.toLowerCase()}?`,
        text: `${title} sẽ được đưa vào thùng rác, bạn có thể phục hồi bất kì lúc nào`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Xác nhận',
        cancelButtonText: 'Thoát'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: 'GET',
                url: urlRequest,
                success: function (data) {
                    if (data.code == 200) {
                        that.parent().parent().remove();

                        Swal.fire(
                            'Đã xong!',
                            `${title} đã được đưa vào thùng rác`,
                            'success'
                        )
                    }
                },
                error: function () {
                    Swal.fire(
                        'Lỗi!',
                        'Lỗi xảy ra trong quá trình xóa, vui lòng thử lại',
                        'error'
                    )
                }
            })
        }
    })
}

$(function () {
    $(document).on('click', '.action-delete', actionDelete);
});

