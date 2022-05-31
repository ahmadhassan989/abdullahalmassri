@extends('admin.layouts.app')

<div class="page-content" style='margin-top:100px'>
        <div class="content">
            <div class="page-title">
                <h4>Add PromoCode</h4>
            </div>
            <!-- Add and delete form  -->
            <div class="page=form">
                <fieldset class="fieldset">
                    
                    <legend>
                        <h5>Add New PromoCode</h5>
                    </legend>
                    <form action="{{route('promocodes.store')}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="fieldset-body">
                        <div class="row">
                    
                            <div class="col-12"></div>
                                <div class="col-md-6 form-group">
                                    <div class="control-container">
                                        <label class="control-lable">
                                            <span class="title">Sales Percentage</span>
                                            <!-- To hide validate span add class "hide" -->
                                        </label>
                                        <input  value="{{old('reward')}}" class="form-control" name="reward" type='number' step="0.01" placeholder="Reward Value ex.(write 0.3 for 30% sale)" required>
                                    </div>
                                </div>

                                <div class="col-12"></div>
                                <div class="col-md-6 form-group">
                                    <div class="control-container">
                                        <label class="control-lable">
                                            <span class="title">Promocode Validation</span>
                                            <!-- To hide validate span add class "hide" -->
                                        </label>
                                        <input  value="{{old('expires_in')}}" class="form-control" type='number' name="expires_in" placeholder="Add days number for Promocode validation" required>
                                    </div>
                                </div>
                                <div class="col-12"></div>
                                <div class="col-md-6 form-group">
                                    <div class="control-container">
                                        <label class="control-lable">
                                            <span class="title">Users Count</span>
                                            <!-- To hide validate span add class "hide" -->
                                        </label>
                                        <input  value="{{old('quantity')}}" class="form-control" type='number' name="quantity" placeholder="Users count can use this Promocode " required>
                                    </div>
                                </div>
                            

                            <div class="action-row">
                                <button class="btn btn-primary" >Save</button>
                                <a href="{{route('promocodes.index')}}" class="btn btn-light">Cancel</a>
                            </div>
                    </div>
                </form>
                </fieldset>
                
            </div>
        </div>
    </div>