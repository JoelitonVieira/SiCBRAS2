@extends('layouts.auth')

@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-md-4"></div> 
        <div class="col-md-4">
            <div class="panel" style="margin-top: -40px;box-shadow: 1px 1px 4px #dddddd; padding: 50px 0px">
                <div class="panel-heading text-center">
                    <img src="/adminlte/img/sicbras.jpg">
                </div> 
                <div class="panel-body">
                    @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> @lang('quickadmin.qa_there_were_problems_with_input'):
                        <br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <div class="col-md-1"></div>
                    <div class="col-md-10">
                        
                    
                    <form class="form-horizontal"
                          role="form"
                          method="POST"
                          action="{{ url('login') }}">
                        <input type="hidden"
                               name="_token"
                               value="{{ csrf_token() }}">

                        <div class="form-group">
                            <input placeholder="Matricula" type="matricula" class="form-control" name="matricula" value="{{ old('matricula') }}">
                        </div>

                        <div class="form-group">

                            <input placeholder="Senha" type="password"class="form-control" name="password">
                           
                        </div>


                        <div class="form-group">
                            <div class="col-md-6">
                                <label class="text-success">
                                    <input type="checkbox"
                                           name="remember"> @lang('quickadmin.qa_remember_me')
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                          
                            <button type="submit"
                                        class="btn btn-success btn-block"
                                        style="margin-right: 15px;">
                                    @lang('quickadmin.qa_login')
                                </button>
                           
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">&nbsp;</div>
    </div>  
</div>

@endsection