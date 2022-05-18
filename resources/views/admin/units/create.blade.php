@extends('layouts.app')

<div class="page-content" style='margin-top:100px'>
    <div class="content">
        <div class="page-title">
            <h4>Add Unit</h4>
        </div>
        <!-- Add and delete form  -->
        <div class="page=form">
            <fieldset class="fieldset">
                <legend>
                    <h5>Add New Unit</h5>
                </legend>
                <form action="{{route('unit.store')}}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="fieldset-body">
                        <div class="row">

                            <div class="col-12"></div>
                            <div class="col-md-4 form-group">
                                <div class="control-container">
                                    <label class="control-lable">
                                        <span class="title">Unit Name</span>
                                        <!-- To hide validate span add class "hide" -->
                                    </label>
                                    <input value="{{old('unit')}}" type="text" class="form-control" name="unit"
                                        placeholder="Unit" required>
                                </div>
                            </div>
                            <div class="action-row">
                                <button class="btn btn-primary">Save</button>
                                <a href="{{route('unit.index')}}" class="btn btn-light">Cancel</a>

                            </div>
                        </div>
                    </div>
                </form>
            </fieldset>

        </div>
    </div>
</div>