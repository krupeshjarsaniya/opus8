@foreach($agentsBill as $key => $value)

    <div class="  border-top border-gray">
        <form action="#" class="row" onsubmit="return false" method="post" name="Form_Name_{{ $value->first_name }}_{{ $value->id }}"  id="Form_Name_{{ $value->first_name }}_{{ $value->id }}">
            <input type="hidden" name="agent_id" value="{{ $value->id }}">
            <div class="col-lg-3 col-12 px-3  my-3">
                <div class="row">
                    <img src="{{ $value->getProfilePicAttribute() ?? asset('assets/images/avatar-img.png') }}" alt="remedy" class="col-lg-3 col-12 rounded-circle p-lg-0 px-5 ">
                    <label class="col-lg-9 mt-lg-3 col-12 text-lg-left text-center mt-3"><h5 >{{ $value->first_name }}</h5></label>
                </div>
            </div>
            <div class="col-lg-3 px-3 bg-2 form-group my-lg-4 my-2">
                <div class="remedy-input-icon-wrapper">
                    <input type="text" class=" form-control " name="weekly_billing" value="{{ $value->billings->weekly_billing ?? '' }}" placeholder="Weekly Billings">
                </div>
            </div>
            <div class="col-lg-3 px-3 bg-2 form-group my-lg-4 my-2">
                <div class="remedy-input-icon-wrapper">
                    <input type="text" class=" form-control " name="average_close_out" value="{{ $value->billings->average_close_out ?? '' }}" placeholder="Average Close Out">
                </div>
            </div>
            <div class="col-lg-3 px-3 bg-2 form-group my-lg-4 my-2">
                <button type="button" class="remedy-billing-btn" data-id="Form_Name_{{ $value->first_name }}_{{ $value->id }}" onclick="SubmitBillings(this)">Submit <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
            </div>
        </form>
    </div>
@endforeach
