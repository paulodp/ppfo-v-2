@extends('backpack::layout')

@section('after_styles')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<style>
  .required-field {
    color: red;
  }
</style>
@endsection

@section('header')
    <section class="content-header">
      <h1>
        Items<small>Add Parts.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ backpack_url() }}">Admin</a></li>
        <li><a href="{{ route('computer.index') }}">Computers</a></li>
        <li class="active">Add</li>
      </ol>
    </section>
@endsection

@section('content')
<div class="row">
  <div class="col-md-8 col-md-offset-2">
    <!-- Default box -->  
    <a href="{{ route('computer.index') }}" class="hidden-print"><i class="fa fa-angle-double-left"></i> Back to all computers</a><br><br>
    
    {{-- Show the errors, if any --}}
    @if ($errors->any())
        <div class="callout callout-danger">
            {{-- <h4>dsasdadsa</h4> --}}
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

      <form method="post" action="{{ route('component.store' , $computer->id) }}" enctype="multipart/form-data">
      {!! csrf_field() !!}
      <div class="box">

        <div class="box-header with-border">
          <h3 class="box-title">Add a new Part/Component</h3>
        </div>
        <div class="box-body row display-flex-wrap" style="display: flex; flex-wrap: wrap;">

          <div class="form-group col-xs-12">
            <div class="row">
              <div class="col-xs-3">
                <label>Category <span class="required-field">*</span></label>
                  <select class="form-control js-single" name="category" id="category">
                    <option value="none">Select Category</option>
                    <option value="0">Peripherals</option>
                    <option value="1">Components</option>
                  </select>
                </div>

                <div class="col-xs-3">
                  <label>Type <span class="required-field">*</span></label>
                  <select class="form-control js-single" name="type" id="type">
                    <option value="none">Select Type</option>
                  </select>
                </div>

                <div class="col-xs-3">
                  <label>Brand <span class="required-field">*</span></label>
                  <input type="text" name="brand" class="form-control">
                </div>

                <div class="col-xs-3">
                  <label>Description <span class="required-field">*</span></label>
                  <input type="text" name="description" class="form-control">
                </div>

              </div>
            </div>
          
            <div class="form-group col-xs-12">
              <div class="row">

                <div class=" col-xs-3">
                  <label>Serial Number <span class="required-field">*</span></label>
                  <input type="text" name="serial" class="form-control">
                </div>

                <div class=" col-xs-3">
                  <label>Date Purchased <span class="required-field">*</span></label>
                  <input type="date" name="date_purchased" class="form-control">
                </div>

                <div class=" col-xs-3">
                  <label>Amount <span class="required-field">*</span></label>
                  <input type="text" name="amount" class="form-control">
                </div>

                <div class=" col-xs-3">
                  <label>Date Issued <span class="required-field">*</span></label>
                  <input type="date" name="date_issued" class="form-control">
                </div>

              </div>
            </div>


        </div><!-- /.box-body -->
        <div class="box-footer">
          <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
        </div><!-- /.box-footer-->

      </div><!-- /.box -->
      </form>
  </div>
</div>

@endsection

@section('after_scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
  // In your Javascript (external .js resource or <script> tag)
  $(document).ready(function() {
      $('.js-single').select2();
  });

   /* Load positions into postion <selec> */
  $( "#category" ).change(function() 
  {
    // alert( this.value );
    if(this.value == 0){
      $('#type').append('<option value="Monitor" selected="selected">Monitor</option>');
      $('#type').append('<option value="Keyboard" selected="selected">Keyboard</option>');
      $('#type').append('<option value="Mouse" selected="selected">Mouse</option>');
      $('#type').append('<option value="Headset" selected="selected">Headset</option>');
    }

    if(this.value == 1) {
      $('#type').append('<option value="RAM" selected="selected">RAM</option>');
      $('#type').append('<option value="HDD" selected="selected">HDD</option>');
      $('#type').append('<option value="CPU" selected="selected">CPU</option>');
      $('#type').append('<option value="Motherboard" selected="selected">Motherboard</option>');
      $('#type').append('<option value="GPU" selected="selected">GPU</option>');
    }
    /*$.getJSON("/category/"+ $(this).val() +"/positions", function(jsonData){
        select = '<select name="position" class="form-control input-sm " required id="position" >';
          $.each(jsonData, function(i,data)
          {
               select +='<option value="'+data.position_id+'">'+data.name+'</option>';
           });
        select += '</select>';
        $("#position").html(select);
    });*/
  });
</script>
@endsection