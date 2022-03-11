@foreach($agentsIndustry as $key => $value)
<div class=" mt-4 border-top border-gray">
    <form action="#" class="row" onsubmit="return false" method="post" name="Form_Name_{{ $value->first_name }}_{{ $value->id }}"  id="Form_Name_{{ $value->first_name }}_{{ $value->id }}">
        <input type="hidden" name="agent_id" value="{{ $value->id }}">
    <div class="col-lg-2 mt-2">
        <img src="{{ $value->getProfilePicAttribute() ?? asset('assets/images/avatar-img.png') }}" alt="remedy" class="col-lg-4 rounded-circle p-0">
        <label><h5 class="pl-3"></h5><a href="{{ route('industry.chart',Crypt::encryptString($value->id) )}}">{{ $value->first_name }}</a></h5></label>
    </div>
    <div class="col-lg-9 mt-2">
        <div class="row m-0">
            <div class="col-lg-6 m-0 p-0">
                <div class="row m-0">
                    <div class="col-lg-3">
                         <div class="remedy-input-icon-wrapper">
                            <input type="text" class=" form-control px-1 " name="health_care" value="{{ $value->industry->health_care ?? '' }}" autocomplete="" autofocus placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                         <div class="remedy-input-icon-wrapper">
                            <input type="text" class=" form-control px-1 " name="IT" value="{{ $value->industry->IT ?? '' }}" autocomplete="" autofocus placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                         <div class="remedy-input-icon-wrapper">
                            <input type="text" class=" form-control px-1 " name="gas_oil" value="{{ $value->industry->gas_oil ?? '' }}" autocomplete="" autofocus placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                         <div class="remedy-input-icon-wrapper">
                            <input type="text" class=" form-control px-1 " name="hospitality" value="{{ $value->industry->hospitality ?? '' }}" autocomplete="" autofocus placeholder="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 m-0 p-0">
                <div class="row m-0">
                    <div class="col-lg-3">
                        <div class="remedy-input-icon-wrapper">
                            <input type="text" class=" form-control px-1 " name="logistics" value="{{ $value->industry->logistics ?? '' }}" autocomplete="" autofocus placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="remedy-input-icon-wrapper">
                            <input type="text" class=" form-control px-1 " name="construction" value="{{ $value->industry->construction ?? '' }}" autocomplete="" autofocus placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="remedy-input-icon-wrapper">
                            <input type="text" class=" form-control px-1 " name="industrial" value="{{ $value->industry->industrial ?? '' }}" autocomplete="" autofocus placeholder="">
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="remedy-input-icon-wrapper">
                            <input type="text" class=" form-control px-1 " name="finance" value="{{ $value->industry->finance ?? '' }}" autocomplete="" autofocus placeholder="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-1 mt-2">
        <button type="button" class="remedy-billing-btn" data-id="Form_Name_{{ $value->first_name }}_{{ $value->id }}" onclick="SubmitBillings(this)">Submit <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
    </div>
    </form>
</div>
@endforeach
