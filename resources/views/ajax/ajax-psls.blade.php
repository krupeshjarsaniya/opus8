@foreach($agentsPsls as $agent)
<div class="row border-top border-gray mt-2 mx-0">
<form action="#" class="row mx-0" onsubmit="return false" method="post" name="Form_Name{{ $agent->first_name }}{{ $agent->id }}"  id="Form_Name{{ $agent->first_name }}{{ $agent->id }}">
        <input type="hidden" name="agent_id" value="{{ $agent->id }}">
    <div class="col-lg-2 col-12  mt-3 mt-lg-2">
        <div class="row m-0">
            <div class="col-lg-4 col-12 px-md-5 px-lg-0 p-0">
                <img src="{{ $agent->getProfilePicAttribute() ?? asset('assets/images/avatar-img.png') }}" alt="remedy" class="psls_image">
            </div>
            <label class="col-lg-8 text-lg-left col-12 text-center mt-lg-2 mt-4 "><h5><a href="{{ route('agent.chart',Crypt::encryptString($agent->id) )}}">{{ $agent->first_name }}</a></h5></label>
        </div>
    </div>
    <div class="col-lg-10 mt-2">
        <div class="row mx-0">
            <div class="col-lg-3 mt-4 mt-lg-0">
                <div class="remedy-input-icon-wrapper">
                    <input type="text" class="form-control " name="new_on_board" value="{{$agent->psls->new_on_board ?? ''}}" placeholder="New on Board">
                </div>
            </div>
            <div class="col-lg-3 mt-4 mt-lg-0">
                <div class="remedy-input-icon-wrapper">
                    <input type="text" class="form-control " name="sector" value="{{$agent->psls->sector ??  ''}}" placeholder="Sector">
                </div>
            </div>
            <div class="col-lg-3 mt-4 mt-lg-0">
                <div class="remedy-input-icon-wrapper">
                    <input type="text" class=" form-control " name="company" value="{{$agent->psls->company ?? ''}}" placeholder="Company">
                </div>
            </div>
            <div class="col-lg-3 mt-4 mt-lg-0">
                <button type="button" class="remedy-login-btn mb-lg-0 mb-3" id="psls_load" data-id="Form_Name{{ $agent->first_name }}{{ $agent->id }}" onclick="pslsSubmit(this)">Submit <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
            </div>
        </div>
    </div>
    </form>
</div>
@endforeach