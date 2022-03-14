@foreach($agentsIndustry as $key => $value)
<div class=" mt-4 border-top border-gray">
    <form action="#" class="row" onsubmit="return false" method="post" name="Form_Name_{{ $value->first_name }}_{{ $value->id }}"  id="Form_Name_{{ $value->first_name }}_{{ $value->id }}">
        <input type="hidden" name="agent_id" value="{{ $value->id }}">
    <div class="col-lg-2 mt-2">
        <img src="{{ asset('assets/images/avatar-img.png') }}" alt="remedy" style="width: 70px; height: 70px; object-fit: cover; border-radius: 50%;">
        <label><h5 class="pl-3">{{ $value->first_name }}</h5></label>
    </div>
    <div class="col-lg-9 mt-2">
        <div class="row m-0">
            <div class="col-lg-6 m-0 p-0">
                <div class="row m-0">
                    <div class="col-lg-3">
                         <div class="remedy-input-icon-wrapper">
                            <input type="text" class="form-control px-2" name="health_care" value="{{ $value->industry->health_care ?? '' }}" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                         <div class="remedy-input-icon-wrapper">
                            <input type="text" class="form-control px-2" name="IT" value="{{ $value->industry->IT ?? '' }}" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                         <div class="remedy-input-icon-wrapper">
                            <input type="text" class="form-control px-2" name="gas_oil" value="{{ $value->industry->gas_oil ?? '' }}" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                         <div class="remedy-input-icon-wrapper">
                            <input type="text" class="form-control px-2" name="hospitality" value="{{ $value->industry->hospitality ?? '' }}" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 m-0 p-0">
                <div class="row m-0">
                    <div class="col-lg-3">
                        <div class="remedy-input-icon-wrapper">
                            <input type="text" class="form-control px-2" name="logistics" value="{{ $value->industry->logistics ?? '' }}" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="remedy-input-icon-wrapper">
                            <input type="text" class="form-control px-2" name="construction" value="{{ $value->industry->construction ?? '' }}" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="remedy-input-icon-wrapper">
                            <input type="text" class="form-control px-2" name="industrial" value="{{ $value->industry->industrial ?? '' }}" placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="remedy-input-icon-wrapper">
                            <input type="text" class="form-control px-2" name="finance" value="{{ $value->industry->finance ?? '' }}" placeholder="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-1 mt-2 px-0">
        <button type="button" class="remedy-billing-btn px-5" data-id="Form_Name_{{ $value->first_name }}_{{ $value->id }}" onclick="SubmitBillings(this)">Submit <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
    </div>
    </form>
</div>
@endforeach
