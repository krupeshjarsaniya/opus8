@foreach($agentsBill as $key => $value)
    <div class=" mt-3 border-top border-gray">
        <form action="#" class="row" onsubmit="return false" method="post" name="Form_Name_{{ $value->first_name }}_{{ $value->id }}"  id="Form_Name_{{ $value->first_name }}_{{ $value->id }}">
            <input type="hidden" name="agent_id" value="{{ $value->id }}">
            <div class="col-lg-3 px-3  mt-2">
                <img src="{{ asset('assets/images/avatar-img.png') }}" alt="remedy" class="col-lg-2 rounded-circle p-0">
                <label><h5 class="pl-lg-3 pl-1">{{ $value->first_name }}</h5></label>
            </div>
            <div class="col-lg-3 px-3 bg-2 form-group mt-2">
                <div class="remedy-input-icon-wrapper">
                    <input type="text" class=" form-control " name="weekly_billing" value="{{ $value->billings->weekly_billing ?? '' }}" autocomplete="" autofocus placeholder="">
                </div>
            </div>
            <div class="col-lg-3 px-3 bg-2 form-group mt-2">
                <div class="remedy-input-icon-wrapper">
                    <input type="text" class=" form-control " name="average_close_out" value="{{ $value->billings->average_close_out ?? '' }}" autocomplete="" autofocus placeholder="">
                </div>
            </div>
            <div class="col-lg-3 px-3 bg-2 form-group mt-2">

                    <button type="button" class="remedy-billing-btn" data-id="Form_Name_{{ $value->first_name }}_{{ $value->id }}" onclick="SubmitBillings(this)">Submit <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>

            </div>
        </form>
    </div>
@endforeach
