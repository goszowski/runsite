@extends('runsite::layouts.app')
@section('content')

  {!! $node->breadcrumbHtml() !!}

  <ul class="nav nav-tabs" role="tablist">
    @foreach($languages as $key=>$language)
      <li role="presentation" class="{{!$key ? 'active' : null}}">
        <a href="#language-tab-{{$language->id}}" role="tab" data-toggle="tab">{{$language->display_name}}</a>
      </li>
    @endforeach
  </ul>
    <div class="panel panel-default">



      <div class="panel-body">
        <form action="{{route('runsite.nodes.update', $node->id)}}" method="post" >
          {{csrf_field()}}
          {{method_field('PATCH')}}

          <div class="tab-content">
            @foreach($languages as $key=>$language)
              <div role="tabpanel" class="tab-pane {{!$key ? 'active' : null}}" id="language-tab-{{$language->id}}">
                @foreach($node->model->fields() as $field)
                  @include('runsite::page-builder.field-types.'.$field->type()::fieldTemplate(), [
                    'name' => 'languages['.$language->id.']['.$field->name.']',
                    'maxlength' => 255,
                    'label' => $field->display_name,
                    'value' => $node->getValue($language->id, $field->name),
                  ])
                @endforeach
              </div>
            @endforeach
          </div>


          <button type="submit" class="btn btn-primary rippler rippler-default"><i class="icofont icofont-check"></i> Update</button>
        </form>
      </div>
    </div>

    <ul class="nav nav-tabs" role="tablist">
      @foreach($subModels as $key=>$subModel)
        <li role="presentation" class="{{$activeSubModel->id == $subModel->id ? 'active' : null}}">
          <a href="{{route('runsite.nodes.edit', ['id'=>$node->id, 'model_id'=>$subModel->id])}}">{{$subModel->display_name}}</a>
        </li>
      @endforeach
    </ul>
    <div class="panel panel-default">
      <div class="panel-body">
        <div class="form-group">
          <a href="{{route('runsite.nodes.create', ['parent_id'=>$node->id, 'model_id'=>$activeSubModel->id])}}" class="btn btn-success btn-xs"><i class="icofont icofont-plus"></i></a>
        </div>
        @if(count($children))
          <div class="table-responsive">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>ID</th>
                  @foreach($activeSubModel->fields() as $field)
                    <th>{{$field->display_name}}</th>
                  @endforeach
                  <th class="text-right">Actions</th>
                </tr>
              </thead>
              <tbody>
                @foreach($children as $child)
                  <tr>
                    <td>{{$child->node_id}}</td>
                    @foreach($activeSubModel->fields() as $field)
                      <td>
                        {!! $field->type()::visualValue($child->{$field->name}) !!}
                      </td>
                    @endforeach
                    <td class="text-right">
                      <a href="{{route('runsite.nodes.edit', ['id'=>$child->node->id])}}" class="btn btn-primary btn-xs"><i class="icofont icofont-edit-alt"></i></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        @else
          <div class="alert alert-info">
            Section is empty
          </div>
        @endif
      </div>
    </div>
@endsection
