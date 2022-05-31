@extends('admin.layouts.app')

<div class="page-content" style='margin-top:100px'>
    <div class="content">
        <div class="page-title">

        </div>
        <!-- Add and delete form  -->
        <div class="page=form">
            <fieldset class="fieldset">

                <legend>
                    <h5>Edit "{{$promocode->code}}" PromoCode</h5>
                </legend>
                <form action="{{route('promocodes.update',$promocode->id)}}" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="_method" value="PUT">
                    <div class="fieldset-body">
                        <div class="row">

                            <div class="col-12"></div>
                            <div class="col-md-6 form-group">
                                <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Sales Percentage</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <input value="{{$promocode->reward}}" class="form-control" name="reward"
                                        type='number' step="0.01"
                                        placeholder="Reward Value ex.(write 0.03 for 30% sale)" required>
                                </div>
                            </div>

                            <div class="col-12"></div>
                            <div class="col-md-6 form-group">
                                <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Promocode Validation</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <input value="{{$promocode->expires_at}}" id="datepicker" class="form-control"
                                        name="expires_in" required>
                                </div>
                            </div>
                            <div class="col-12"></div>
                            <div class="col-md-6 form-group">
                                <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Users Count</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <input value="{{$promocode->total_quantity}}" class="form-control" type='number'
                                        name="quantity" placeholder="Users count can use this Promocode " required>
                                </div>
                            </div>


                            <div class="action-row">
                                <button class="btn btn-primary">Save</button>
                                <a href="{{route('promocodes.index')}}" class="btn btn-light">Cancel</a>
                            </div>
                        </div>
                </form>
            </fieldset>

        </div>
    </div>

</div>

@section('scripts')
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.11.0/jquery-ui.js"></script>
<script>
var today, datepicker;
today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
datepicker = $('#datepicker').datepicker({
    minDate: today,
    format: 'yyyy-mm-dd'
});
</script>
@endsection