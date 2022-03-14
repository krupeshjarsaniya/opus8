@foreach($agentsIndustry as $key => $value)
<div class="my-3 m-0 border-top border-gray">
    <form action="#" class="row" onsubmit="return false" method="post" name="Form_Name_{{ $value->first_name }}_{{ $value->id }}"  id="Form_Name_{{ $value->first_name }}_{{ $value->id }}">
        <input type="hidden" name="agent_id" value="{{ $value->id }}">
    <div class="col-lg-2 mt-2">
        <div class="row m-0">
            <img src="{{ $value->getProfilePicAttribute() ?? asset('assets/images/avatar-img.png') }}" alt="remedy" class="col-lg-4 rounded-circle p-lg-0 px-5">
            <label class="col-lg-8 col-12 text-lg-left text-center mt-lg-3 mt-4"><a href="{{ route('industry.chart',Crypt::encryptString($value->id) )}}">{{ $value->first_name }}</a></h5></label>
        </div>
    </div>
    <div class="col-lg-9 col-12 mt-2 my-2 mx-0">
        <div class="row m-0">
            <div class="col-lg-6 col-12 m-0 p-0">
                <div class="row m-0">
                    <div class="col-lg-3 col-12 mt-lg-0 mt-4">
                         <div class="remedy-input-icon-wrapper">
                            <input type="text" class="form-control px-lg-2 px-3" name="health_care" value="{{ $value->industry->health_care ?? '' }}" placeholder="Health Care">
                        </div>
                    </div>
                    <div class="col-lg-3 col-12 mt-lg-0 mt-4">
                         <div class="remedy-input-icon-wrapper">
                            <input type="text" class="form-control px-lg-2 px-3" name="IT" value="{{ $value->industry->IT ?? '' }}" placeholder="IT">
                        </div>
                    </div>
                    <div class="col-lg-3 col-12 mt-lg-0 mt-4">
                         <div class="remedy-input-icon-wrapper">
                            <input type="text" class="form-control px-lg-2 px-3" name="gas_oil" value="{{ $value->industry->gas_oil ?? '' }}" placeholder="Gas & Oil">
                        </div>
                    </div>
                    <div class="col-lg-3 col-12 mt-lg-0 mt-4">
                         <div class="remedy-input-icon-wrapper">
                            <input type="text" class="form-control px-lg-2 px-3" name="hospitality" value="{{ $value->industry->hospitality ?? '' }}" placeholder="Hospitality">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-12 m-0 p-0">
                <div class="row m-0">
                    <div class="col-lg-3 col-12 mt-lg-0 mt-4">
                        <div class="remedy-input-icon-wrapper">
                            <input type="text" class="form-control px-lg-2 px-3" name="logistics" value="{{ $value->industry->logistics ?? '' }}" placeholder="Logistics">
                        </div>
                    </div>
                    <div class="col-lg-3 col-12 mt-lg-0 mt-4">
                        <div class="remedy-input-icon-wrapper">
                            <input type="text" class="form-control px-lg-2 px-3" name="construction" value="{{ $value->industry->construction ?? '' }}" placeholder="Construction">
                        </div>
                    </div>
                    <div class="col-lg-3 col-12 mt-lg-0 mt-4">
                        <div class="remedy-input-icon-wrapper">
                            <input type="text" class="form-control px-lg-2 px-3" name="industrial" value="{{ $value->industry->industrial ?? '' }}" placeholder="Industrial">
                        </div>
                    </div>
                    <div class="col-lg-3 col-12 mt-lg-0 mt-4">
                        <div class="remedy-input-icon-wrapper">
                            <input type="text" class="form-control px-lg-2 px-3" name="finance" value="{{ $value->industry->finance ?? '' }}" placeholder="Finance">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-1 mt-2 pl-0">
        <button type="button" class="remedy-billing-btn" data-id="Form_Name_{{ $value->first_name }}_{{ $value->id }}" onclick="SubmitBillings(this)">Submit <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
    </div>
    </form>
</div>
@endforeach
