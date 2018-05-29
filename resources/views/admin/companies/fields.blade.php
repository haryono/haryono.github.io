<!-- Name Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Name', 'Name:') !!}
    {!! Form::text('Name', null, ['class' => 'form-control']) !!}
</div>

<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('Description', 'Description:') !!}
    {!! Form::text('Description', null, ['class' => 'form-control']) !!}
</div>

<!-- Companyemail Field -->
<div class="form-group col-sm-12">
    {!! Form::label('CompanyEmail', 'Companyemail:') !!}
    {!! Form::email('CompanyEmail', null, ['class' => 'form-control']) !!}
</div>

<!-- Effectivedate Field -->
<div class="form-group col-sm-12">
    {!! Form::label('EffectiveDate', 'Effectivedate:') !!}
    {!! Form::date('EffectiveDate', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12 text-center">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.companies.index') !!}" class="btn btn-default">Cancel</a>
</div>
