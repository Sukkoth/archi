@extends('admin.layouts.main_layouts')
        @section('content') {{--Content start--}}
        @include('admin.partial.navbar')

            {{-- About company --}}
            <div class="container-fluid pt-4 px-4">
                <div class="row g-6">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">About Company</h6>
                            <form>
                                <div class="mb-3">
                                    <label for="companyName" class="form-label">Company Name</label>
                                    <input type="text" class="form-control" id="companyName" name="companyName" disabled value="{{ $aboutCompany['name'] }}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="companySlogan" class="form-label">Company Slogan</label>
                                    <input type="text" class="form-control" id="companySlogan" disabled value="{{ $aboutCompany['slogan'] }}" required>
                                </div>

                                <div class="mb-4">
                                    <label for="companyExperience" class="form-label">Experience Yers</label>
                                    <input type="number" class="form-control" id="companyExperience" disabled value="{{ $aboutCompany['experience'] }}">
                                </div>

                                <div class="mb-3">
                                    <label for="companyDescription">Description</label>
                                    <textarea class="form-control" placeholder="Describe your comany here" disabled
                                        id="companyDescription" style="height: 150px;" required>{{ $aboutCompany['description'] }}</textarea>
                                </div>

                                <button type="submit" class="btn btn-primary" disabled id="update-about-company">Update</button>
                                <button class="btn btn-danger" id="edit_company_info" type="button">Edit</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-light rounded h-100 p-4">
                            <h6 class="mb-4">Contact information</h6>
                            <form>
                                <div class="row mb-3">
                                    <label for="companyEmail" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="companyEmail" value="{{ $companyContact['email'] }}" disabled placeholder="email@email.com">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="companyAddress" class="col-sm-2 col-form-label">Address</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="companyAddress" value="{{ $companyContact['address'] }}" disabled placeholder="detailed company address">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="companyPhone" class="col-sm-2 col-form-label">Phone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="companyPhone" value="{{ $companyContact['phone'] }}" disabled placeholder="+2519, +2517">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="companyTelephone" class="col-sm-2 col-form-label">Telephone</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="companyTelephone" value="{{ $companyContact['telephone'] }}" disabled placeholder="telephone">
                                    </div>
                                </div>
                                
                                <button id="update-company-contact" class="btn btn-primary" disabled>Update</button>
                                <button class="btn btn-danger" id="edit_company_contact" type="button">Edit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>  
            {{-- About Company --}}
@endsection {{--Content end--}}



@section('scripts')
<script>
    $("#edit_company_info").click(function(){
        document.getElementById("companyName").disabled = false;
        document.getElementById("companySlogan").disabled = false;
        document.getElementById("companyDescription").disabled = false;
        document.getElementById("companyExperience").disabled = false;
        document.getElementById("update-about-company").disabled = false;
  });

  $("#edit_company_contact").click(function(){
        document.getElementById("companyEmail").disabled = false;
        document.getElementById("companyAddress").disabled = false;
        document.getElementById("companyPhone").disabled = false;
        document.getElementById("companyTelephone").disabled = false;
        document.getElementById("update-company-contact").disabled = false;
  });
</script>
<script>
    // Update Company info
    $("#update-about-company").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            companyName: jQuery('#companyName').val(),
            companySlogan: jQuery('#companySlogan').val(),
            companyExperienceYears: jQuery('#companyExperience').val(),
            companyDescription: jQuery('#companyDescription').val()
        };
        $.ajax({
            type: "POST",
            url: '{{route('update_about_company')}}',
            data: formData,
            dataType: 'json',
            success: function (data) {
                console.log(data.data.message);
                toastr.success(data.data.message);
                document.getElementById("companyName").disabled = true;
                document.getElementById("companySlogan").disabled = true;
                document.getElementById("companyDescription").disabled = true;
                document.getElementById("companyExperience").disabled = true;
                document.getElementById("update-about-company").disabled = true;
            },
            error: function (errors) {
                for (let error in errors.responseJSON.errors) { 
                    toastr.error(errors.responseJSON.errors[error]);
                }
            }
        });
    });
</script>

<script>
    // Update Company contact info
    $("#update-company-contact").click(function (e) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
            }
        });
        e.preventDefault();
        var formData = {
            companyEmail: jQuery('#companyEmail').val(),
            companyAddress: jQuery('#companyAddress').val(),
            companyPhone: jQuery('#companyPhone').val(),
            companyTelephone: jQuery('#companyTelephone').val()
        };
        $.ajax({
            type: "POST",
            url: '{{route('update_company_contact')}}',
            data: formData,
            dataType: 'json',
            success: function (data) {
                toastr.success(data.message);
                document.getElementById("companyEmail").disabled = true;
                document.getElementById("companyAddress").disabled = true;
                document.getElementById("companyPhone").disabled = true;
                document.getElementById("companyTelephone").disabled = true;
                document.getElementById("update-company-contact").disabled = true;
            },
            error: function (errors) {
                for (let error in errors.responseJSON.errors) { 
                    toastr.error(errors.responseJSON.errors[error]);
                }
            }
        });
    });
</script>
@endsection
