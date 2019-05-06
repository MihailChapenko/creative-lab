$(document).ready(function () {
    $('#changeAvatarBtn').on('click', function () {
        $('#changeAvatar').modal('show');
    });

    $('button[data-id="profileCountry"]').on('click', function () {
        $.ajax({
            type: 'post',
            url: 'get_countries_list',
            error: function (error) {
                Sweetalert2({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Reload the page please!'
                });
            },
            success: function (data) {
                $(data).each(function (index, value) {
                    $('#profileCountry').append(`
                        <option id-country="${value.id}" value="${value.name}">${value.name}</option>
                    `);
                });
                $('.selectpicker').selectpicker('refresh');
            }
        })
    });

    $('button[data-id="profileCity"]').on('click', function () {
        clearValidation();
        $('#profileCityDiv .dropdown-menu').css('display', 'block');
        let countryId = $('#profileCountry option:selected').attr('id-country');
        console.log(countryId);
        $.ajax({
            type: 'post',
            url: 'get_cities_list',
            data: {
                countryId: countryId
            },
            error: function(error) {
                Sweetalert2({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Reload the page please!'
                });
            },
            success: function(data) {
                if(data.error) {
                    $('#profileCityDiv').addClass('has-error');
                    $('#profileCityDiv').append('<span class="validation-error"><strong>' + data.error + '</strong></span>');
                    $('#profileCityDiv .dropdown-menu').css('display', 'none');

                    return false;
                }
                else
                {
                    $(data).each(function (index, value) {
                        $('#profileCity').append(`
                        <option id-city="${value.id}" value="${value.name}">${value.name}</option>
                    `);
                    });
                    $('.selectpicker').selectpicker('refresh');
                }
            }
        });
    });

    $('#updateProfile').on('click', function () {
        clearValidation();
        let profileLogin = $('#profileLogin').val();
        let profileEmail = $('#profileEmail').val();
        let profileName = $('#profileName').val();
        let profileSurname = $('#profileSurname').val();
        let profileAddress = $('#profileAddress').val();
        let profileCountry = $('#profileCountry').val();
        let profileCity = $('#profileCity').val();
        let profilePhone = $('#profilePhone').val();

        $.ajax({
            type: 'post',
            url: 'update_own_profile',
            data: {
                profileLogin: profileLogin,
                profileEmail: profileEmail,
                profileName: profileName,
                profileSurname: profileSurname,
                profileAddress: profileAddress,
                profileCity: profileCity,
                profileCountry: profileCountry,
                profilePhone: profilePhone
            },
            error: function (error) {
                Sweetalert2({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Reload the page please!'
                });
            },
            success: function (data) {
                if (data.error) {
                    $.each(data.error, function (index, value) {
                        $('#' + index + 'Div').addClass('has-error');
                        $('#' + index + 'Div').append('<span class="validation-error"><strong>' + value + '</strong></span>');
                    });
                    return false;
                } else {
                    swal({
                        title: "Success",
                        text: "Your profile updated!",
                        buttonsStyling: false,
                        confirmButtonClass: "btn btn-success",
                        type: "success"
                    });
                }
            }
        })
    });
});
