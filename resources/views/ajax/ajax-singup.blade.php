@foreach ($agentSignup as $agent)
    <form action="#" onsubmit="return false" method="post" name="Form_Name{{ $agent->first_name }}{{ $agent->id }}"  id="Form_Name{{ $agent->first_name }}{{ $agent->id }}">
        <div class="row  border-top border-gray">
            <div class="col-lg-3 px-3  mt-2">
                <div class="row">
                    <img src="{{ $agent->getProfilePicAttribute() ?? asset('assets/images/avatar-img.png') }}" alt="remedy" class="col-lg-2 px-5 px-lg-0 rounded-circle p-0">
                    <label class="col-lg-10 col-12 text-lg-left text-center mt-3"><h5>{{$agent->first_name}}</h5></label>
                </div>
                <input type="hidden" name="agentId" id="agentId" value="{{ $agent->id }}">
            </div>

            <div class="col-lg-3 px-3 bg-2 form-group my-2">
                <div class="remedy-input-icon-wrapper">
                    <input type="text" class=" form-control " name="average_close_out" value="{{ $agent->signup->average_close_out ?? '' }}"  placeholder="Average Close Out">
                </div>
            </div>
            <div class="col-lg-3 px-3 bg-2 form-group my-2">
                <div class="remedy-input-icon-wrapper">
                    <input type="text" class=" form-control " name="agent" value="{{ $agent->signup->agent ?? '' }}"  placeholder="Agent">
                </div>
            </div>
            <div class="col-lg-3 px-3 bg-2 form-group my-2">
               <!--  <button type="submit" class="remedy-login-btn">Sign up <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button> -->
                <button type="button" class="remedy-login-btn" data-id="Form_Name{{ $agent->first_name }}{{ $agent->id }}" onclick="signUpSubmit(this)">Submit <i><img src="{{ asset('assets/images/back-arrow-icon.svg') }}" alt="remedy"></i></button>
            </div>
        </div>
    </form>
@endforeach