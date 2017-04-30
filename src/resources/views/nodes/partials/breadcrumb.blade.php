<ol class="breadcrumb">
  @foreach($breadcrumb as $node)
    <li><a href="{{route('runsite.nodes.edit', $node->id)}}">{{$node->values()[0]->name}}</a></li>
  @endforeach
</ol>
