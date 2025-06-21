<x-admin.master title="blogsite">
    <x-admin.header heading="User" />

    <div class="card shadow mb-4">
        <!-- Card Header - Dropdown -->
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <button class="m-0 btn btn-sm btn-primary openModal" data-title="Add User"
                data-url="{{ route('user.create') }}" data-toggle="modal">ADD USER</button>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <table class="table" id="dataTable">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                             <td>{{$user->email}}</td>
                             <td>{{$user->phone}}</td>
                              <td><span class="{{$user->status == 'active' ? 'text-success':'text-danger'}}">{{ucwords($user->status)}}</span></td>
                              <td><button class="btn btn-primary openModal" data-title="Edit User" data-url="{{route('user.edit',$user->id)}}" ><i class="fa fa-edit"></i></button> <button class="btn btn-danger deleteHandler" data-url="{{route('user.destroy',$user->id)}}"><i class="fa fa-trash"></i></button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-admin.master>
