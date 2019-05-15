<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(session('status'))
                <div class="alert alert-success">  
                    {{ session('status') }}   
                </div>        
            @endif 
        <table class="table">
                <thead class="card-header">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    
                @if($records)
                    @foreach($records as $record)
                    <tr>
                        <td>{{ $record->name }}</td>
                        <td>{{ $record->email }}</td>
                        <td>{{ $record->message }}</td>
                        <td>
                        {!! Form::open(['url' => route('admin.records.destroy', ['id'=> $record->id]),'method'=>'POST']) !!}
                        {{ method_field('DELETE') }}
                        {!! Form::button('Del', ['class' => 'btn','type'=>'submit']) !!}
                        {!! Form::close() !!}                       
                        </td>
                        <td>
                        {!! (link_to(route('admin.records.edit',['id'=> $record->id]), 'Edit', ['class' => 'btn'])) !!}                                           
                        </td>
                    </tr>
                    @endforeach
                    @endif                                       
                </tbody>
            </table>    
            </div>
        </div>
    </div>
</div>