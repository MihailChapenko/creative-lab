$(document).ready(function () {
    /**
     * Show add user modal
     */
    $('#addUserBtn').on('click', function () {
        $('#addUserModal').modal('show');
    });

    /**
     *
     */
    $('#addUserSubmit').on('click', function () {
        let userLogin = $('#addUserLogin').val();
        let userEmail = $('#addUserEmail').val();

        $.ajax({
            type: 'post',
            url: 'add_new_user',
            data: {
                userLogin: userLogin,
                userEmail: userEmail,
            },
            error: function(error) {
                Sweetalert2({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Reload the page please!'
                });
            },
            success: function(data) {
                console.log(data);
            }
        });
    });
});
