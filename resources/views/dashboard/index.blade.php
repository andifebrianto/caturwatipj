@extends('dashboard.layouts.main')

@section('container')


  
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <div class="section-title">
            
        <div class="col-md-12">
            <div class="page-header clearfix">
                <h4 style="text-align: center;"><strong>Welcome Back, {{ auth()->user()->name }}</strong></h4>
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted text-uppercase">
                    <span>Welcome Back, {{ auth()->user()->name }}</span>
                    <a class="link-secondary" href="#" aria-label="Add a new report">
                      <span data-feather="plus-circle" class="align-text-bottom"></span>
                    </a>
                </h6>
            </div>
            
        </div>
    </div>
</div>
    
@endsection