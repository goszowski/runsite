@extends('runsite::layouts.app')
@section('content')
    <div class="panel panel-default">
      <div class="panel-heading">{{$model->modelName}}</div>
      <div class="panel-body">
        <a href="{{route('runsite.'.$model->modelName.'.create')}}" class="btn btn-xs btn-success rippler rippler-default" target="runsiteIframe"><i class="icofont icofont-plus"></i></a>
        @if($items->count())
          <table class="table table-condensed table-striped">
            <thead>
              <tr>
                @foreach($items->first()->fields as $field=>$data)
                  @if($data['show_in_list'])
                    <th>{{trans('runsite::'.str_singular($model->modelName).'.'.$field)}}</th>
                  @endif
                @endforeach
                <th></th>
              </tr>
            </thead>
            <tbody>
              @foreach($items as $item)
                <tr>
                  @foreach($item->fields as $field=>$data)
                    @if($data['show_in_list'])
                      <td>
                        @include('runsite::page-builder.field-types.'.$data['controller'].'._view',  ['relation'=>(isset($data['relation']) and $data['relation']) ? $data['relation'] : null])
                      </td>
                    @endif
                  @endforeach
                  <td>
                    <a href="{{route('runsite.'.$model->modelName.'.edit', $item->id)}}" class="btn btn-xs btn-primary rippler rippler-default" target="runsiteIframe"><i class="icofont icofont-edit-alt"></i></a>
                    <form action="{{route('runsite.'.$model->modelName.'.destroy', $item->id)}}" method="post" style="display:inline" target="runsiteIframe">
                      {{csrf_field()}}
                      {{method_field('DELETE')}}
                      <button type="submit" class="btn btn-xs btn-danger rippler rippler-default" onclick="return confirm('{{trans('runsite::main.Confirm delete')}}?')"><i class="icofont icofont-trash"></i></button>
                    </form>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        @else
          <br><br>
          <div class="alert alert-info">
            {{trans('runsite::main.Empty')}}
          </div>
        @endif
      </div>
    </div>
@endsection
