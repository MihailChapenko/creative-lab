$(document).ready(function () {

    /**
     * Show change avatar modal
     */
    $('#changeAvatarBtn').on('click', function () {
        $('#changeAvatar').modal('show');
    });

     /**
     * Show list of 10 randoms countries
     */
    $('button[data-id="profileCountry"]').on('click', function () {
        let nowCountry = $('#profileCountry').val();
        $('#profileCountryDiv').find('.bs-searchbox input').val(nowCountry);

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

    /**
     * Search country by name
     */
    $('#profileCountryDiv').on('keyup', '.bs-searchbox input', function () {
        let country = $('#profileCountryDiv').find('.bs-searchbox input').val();

        $.ajax({
            type: 'post',
            url: 'search_country',
            data: {
                country: country
            },
            error: function (error) {
                Sweetalert2({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Reload the page please!'
                });
            },
            success: function (data) {
                let country = '';
                $(data.countries).each(function (index, value) {
                    country += `<option id-country="${value.id}" value="${value.name}">${value.name}</option>`;
                });
                $('#profileCountry').html(country);
                $('.selectpicker').selectpicker('refresh');
                country = '';
            }
        });
    });

    /**
     * Show list of cities by country
     */
    $('button[data-id="profileCity"]').on('click', function () {
        clearValidation();
        $('#profileCityDiv .dropdown-menu').css('display', 'block');
        let countryId = $('#profileCountry option:selected').attr('id-country');
        console.log(countryId);
        let city = $('#profileCity').val();
        $('#profileCityDiv').find('.bs-searchbox input').val(city);

        $.ajax({
            type: 'post',
            url: 'get_cities_list',
            data: {
                countryId: countryId,
                city: city
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

    /**
     * Search city by name
     */
    $('#profileCityDiv').on('keyup', '.bs-searchbox input', function () {
        let countryId = $('#profileCountry option:selected').attr('id-country');
        let city = $('#profileCityDiv').find('.bs-searchbox input').val();

        $.ajax({
            type: 'post',
            url: 'search_city',
            data: {
                city: city,
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
                let cities = '';
                $(data.citiesList).each(function (index, value) {
                    console.log(value);
                    cities += `<option id-city="${value.id}" value="${value.name}">${value.name}</option>`;
                });
                $('#profileCity').html(cities);
                $('.selectpicker').selectpicker('refresh');
                cities = '';
            }
        });
    });


    /**
     *  Update user profile info
     */
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

    /**
     * Update user password
     */
    $('#updatePass').on('click', function() {
        clearValidation();
       let profileOldPass = $('#profileOldPass').val();
       let profileNewPass = $('#profileNewPass').val();
       let profileNewPass_confirmation = $('#profileNewPass_confirmation').val();

       $.ajax({
           type: 'post',
           url: 'change_user_pass',
           data: {
               profileOldPass: profileOldPass,
               profileNewPass: profileNewPass,
               profileNewPass_confirmation: profileNewPass_confirmation
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
                   $.each(data.error, function (index, value) {
                       $('#' + index + 'Div').addClass('has-error');
                       $('#' + index + 'Div').append('<span class="validation-error"><strong>' + value + '</strong></span>');
                   });
                   return false;
               } else {
                   swal({
                       title: "Success",
                       text: "Your password changed!",
                       buttonsStyling: false,
                       confirmButtonClass: "btn btn-success",
                       type: "success"
                   });
               }
           }
       })
    });
});
