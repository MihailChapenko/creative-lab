$(document).ready(function () {
    $('#changeAvatarBtn').on('click', function () {
        $('#changeAvatar').modal('show');
    });

    $('button[data-id="profileCountry"]').on('click', function () {
        let nowCountry = $('#profileCountry option:selected').attr('id-country');
        // $('#profileCountryBox').find('.bs-searchbox input').val(nowCountry);

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
                let countries = '';
                $(data).each(function (index, value) {
                    countries += `<option id-country="${value.id}" value="${value.name}">${value.name}</option>`;
                });
                $('#profileCountry').html(countries);
                $('.selectpicker').selectpicker('refresh');
                countries = '';
            }
        })
    });

    $('#profileCountryBox').on('keyup', '.bs-searchbox input', function () {
        let nowCountry = $('#profileCountry option:selected').attr('id-country');

        $.ajax({
            type: 'post',
            url: 'search_country',
            data: {
                country: country
            },
            error: function(error) {
                Sweetalert2({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Reload the page please!'
                });
            },
            success: function(data) {
                let country = '';
                $(data.countries).each(function (index, value) {
                    console.log(value);
                    country += `<option id-country="${value.id}" value="${value.name}">${value.name}</option>`;
                });
                $('#profileCountry').html(country);
                $('.selectpicker').selectpicker('refresh');
                country = '';
            }
        });
    });

    $('button[data-id="profileCity"]').on('click', function () {
        clearValidation();
        $('#profileCityDiv .dropdown-menu').css('display', 'block');
        let countryId = $('#profileCountry option:selected').attr('id-country');

        $.ajax({
            type: 'post',
            url: 'get_cities_list',
            data: {
                countryId: countryId
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
                    $('#profileCityDiv').addClass('has-error');
                    $('#profileCityDiv').append('<span class="validation-error"><strong>' + data.error + '</strong></span>');
                    $('#profileCityDiv .dropdown-menu').css('display', 'none');

                    return false;
                } else {
                    let cities = '';
                    $(data).each(function (index, value) {
                        cities += `<option id-city="${value.id}" value="${value.name}">${value.name}</option>`;
                    });
                    $('#profileCity').html(cities);
                    $('.selectpicker').selectpicker('refresh');
                    cities = '';
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
