@extends('admin.layouts.app')
<div class="page-content" style="width:50%; height:fit-content; margin: auto; border-radius:3%">
    <div class="row">
    <div class="col-12"></div>
                            <div class="col-md-6 form-group">
                                    <span>{{$message->created_at}}</span>
                            </div>
                            <div class="col-md-6 form-group">
                                    <span>name: {{$message->name}}</span>
                                    <br>
                                     <span>contact: {{$message->from}}</span>

                            </div>
                            <div class="col-md-12 form-group">
                                <div class="control-container">
                                        <p>{{$message->message}} 
                                        </p>
                                </div>
                            </div>
                            <div class="col-md-2" style=' margin: auto;'>
                                <a class="btn btn-dark" href="{{route('messages.index')}}">Back</a>
                            </div>
    </div>
        
</div>