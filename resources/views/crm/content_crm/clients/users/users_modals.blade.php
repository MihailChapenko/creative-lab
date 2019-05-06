<div class="modal fade" id="changeAvatar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="card upload-avatar">
                <div class="card-header card-header-icon" data-background-color="rose">
                    <i class="material-icons">insert_photo</i>
                </div>
                <div class="card-content">
                    <h4 class="card-title">Change Avatar</h4>
                    <form class="text-center">
                        <div class="row">
                            <div class="col-md-12 m-auto">
                                <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail img-circle">
                                        <img src="{{ asset('default_img/user_avatar.png') }}" alt="avatar">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail img-circle" style=""></div>
                                    <div>
                                        <span class="btn btn-round btn-rose btn-file">
                                            <span class="fileinput-new">Choose Photo</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="hidden"><input type="file" name="...">
                                        <div class="ripple-container"></div></span>
                                        <br>
                                        <a href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-rose">Save</button>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>