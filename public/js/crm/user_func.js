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
    $('#addUserSubmit').on('click', function() {
        let userLogin = $('#addUserLogin').val();
        let userEmail = $('#addUserEmail').val();
        let userPhone = $('#addUserPhone').val();

        $.ajax({
           type: 'post'
        });
    });
});