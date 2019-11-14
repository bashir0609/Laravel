<div class="form-group">
    <label for="company_id">Company</label>
    <select name="company_id" id="company_id" class="form-control">
        @foreach($companies as $company)
          <option value="{{ $company->id }}">{{ $company->name }}</option>
        @endforeach
    </select>
</div>
