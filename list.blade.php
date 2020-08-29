@if(session()->has('message'))
    <div class="alert alert-success" style="margin:20px">
        {{ session()->get('message') }}
    </div>
@endif

<div class="panel panel-default">
					<div class="panel-heading">Liste Matiere
				
        
       
        	<span class="float-right">
					<a href="{{route('enseignant.create.cours')}}">
					<button class="btn btn-success">Cree Cour</button>
					</a>
					</span>
					</div>
					<div class="panel-body">
						<div class="col-md-10">
						<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom cour </th>
      <th scope="col"> Matiere </th>
      <th scope="col">Niveau </th>
      <th scope="col">PDF </th>

     
    </tr>
  </thead>
  <tbody>

  @foreach($cours as $key=>$cour)

    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$cour->getCour('name')}}</td>
      <td>{{$cour->matiere->name}}</td>
      <td>{{$cour->niveau->niveau}}</td>
      <td><a href="{{asset('uploads/cours/'.$cour->file)}}" >{{$cour->getCour('file')}}</a></td>
      <td><a href="{{asset('uploads/cours/'.$cour->file)}}" >{{$cour->getCour('file')}}</a></td>
      <td><a href="{{route('enseignant.edit',$cour->id)}}">Edit </a></td>
      <td>
      
      <form  method="post" action="{{route('enseignant.delete.cours',$cour->id)}}">
      {{ csrf_field() }}

    <input class="btn btn-default" type="submit" value="Delete" />
   
    
</form>
      
    </td>
      
    </tr>
	@endforeach
   
  </tbody>
</table>
{{ $cours->links() }}


						</div>
					</div>