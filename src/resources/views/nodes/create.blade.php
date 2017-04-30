@extends('runsite::layouts.app')
@section('content')
  <ul class="nav nav-tabs" role="tablist">
    @foreach($languages as $key=>$language)
      <li role="presentation" class="{{!$key ? 'active' : null}}">
        <a href="#language-tab-{{$language->id}}" role="tab" data-toggle="tab">{{$language->display_name}}</a>
      </li>
    @endforeach
  </ul>
    <div class="panel panel-default">



      <div class="panel-body">
        <form action="{{route('runsite.nodes.store')}}" method="post" >
          {{csrf_field()}}
          <input type="hidden" name="parent_id" value="{{$parent_id}}">
          <input type="hidden" name="model_id" value="{{$model->id}}">

          <div class="tab-content">
            @foreach($languages as $key=>$language)
              <div role="tabpanel" class="tab-pane {{!$key ? 'active' : null}}" id="language-tab-{{$language->id}}">
                @foreach($model->fields() as $field)
                  @include('runsite::page-builder.field-types.'.$field->type()::fieldTemplate(), [
                    'name' => 'languages['.$language->id.']['.$field->name.']',
                    'maxlength' => 255,
                    'label' => $field->display_name,
                    'value' => $field->type()::defaultValue(),
                  ])
                @endforeach
              </div>
            @endforeach
          </div>


          <button type="submit" class="btn btn-primary rippler rippler-default"><i class="icofont icofont-check"></i> Create</button>
        </form>
      </div>
    </div>
@endsection
