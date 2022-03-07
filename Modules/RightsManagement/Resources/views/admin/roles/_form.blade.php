<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label>Role name</label>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                data-validation="required" value="{{ isset($result) ? $result['name'] : old('name') }}"
                {{ isset($result) ? 'disabled' : '' }}>
            @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Display name</label>
            <input id="display_name" type="text" class="form-control @error('display_name') is-invalid @enderror"
                name="display_name" data-validation="required"
                value="{{ isset($result) ? $result['display_name'] : old('display_name') }}">
            @error('display_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" id="discription"
                class="form-control @error('description') is-invalid @enderror"
                rows="3">{{ isset($result) ? $result['description'] : old('description') }}</textarea>
            @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label>Guard</label>
            <select name="guard_name" id="guard_name" class="form-control select2 @error('guard_name') is-invalid @enderror">
				<option value="">Select</option>
				<option value="admin" {{ (isset($result) && $result['guard_name'] === 'admin') || old('guard_name') === 'admin' ? "selected" : "" }}>Admin</option>
				<option value="web" {{ (isset($result) && $result['guard_name'] === 'web') || old('guard_name') === 'web' ? "selected" : "" }}>Front</option>
			</select>
            @error('guard_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
</div>
