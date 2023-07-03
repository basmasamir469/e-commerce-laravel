@extends('layouts.app')
@section('small-title')
 @lang('edit category')
@endsection

@section('content')
<div class="card card-secondary">
    <div class="card-header">
    <h3 class="card-title">@lang('Edit Category')</h3>
    <div class="card-tools">
    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
    <i class="fas fa-minus"></i>
    </button>
    </div>
    </div>
    <div class="card-body">
        <form action="{{route('Categories.update',$category->id)}}" method='Post'>
          @csrf
          @method('PATCH')
    <div class="form-group">
      <div class="row">
        <div class="col-5">
          <label for="inputEstimatedBudget">@lang('Name in arabic')</label>
          <input type="text" name="category_name[ar]" value="{{$category->getTranslation('category_name','ar')}}" id="inputEstimatedBudget" class="form-control">
          @error('category_name.ar')
          <small  class="form-text text-danger">{{$message}}</small>
          @enderror      
        </div>
        <div class="col-5 ml-5">
          <label for="inputEstimatedBudget">@lang('Name in english')</label>
          <input type="text" name="category_name[en]" value="{{$category->getTranslation('category_name','en')}}" id="inputEstimatedBudget" class="form-control">
          @error('category_name.en')
          <small  class="form-text text-danger">{{$message}}</small>
          @enderror      
        </div>
      </div>
    <input type="hidden" name="id" value="{{$category->id}}" id="inputEstimatedBudget" class="form-control">
    </div>
    <input type="submit" value="{{__('update category')}}" class="btn btn-success float-right">
  </form>

    </div>
    
    </div>
@endsection