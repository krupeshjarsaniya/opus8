@forelse($agents as $agent)
<tr>
    <td>
        <div class="user-details">
            <div class="user-avatar">
                <img src="{{$agent->profile_pic}}" alt="{{$agent->first_name}}">
            </div>
            <h5>{{$agent->first_name}}</h5>
        </div>
    </td>
    <td>
        <div class="user-details preview-btn">
            <h5>{{ $agent->last_name }}</h5>
            <a href="{{ route('agent.show', ['agent' => $agent->id]) }}" class="preview-btn">Preview</a>
        </div>
    </td>
</tr>
@empty
<tr>
    <td class="text-center" colspan="2">No Agents Available</td>
</tr>
@endforelse