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
         @if (!$users->isEmpty())
             @foreach ($users as $user)
                 <tr>
                     <td>{{ $user->id }}</td>
                     <td>{{ $user->name }}</td>
                     <td>{{ $user->email }}</td>
                     <td>{{ $user->phone }}</td>
                     <td><span
                             class="{{ $user->status == 'active' ? 'badge badge-success' : 'badge badge-danger' }}">{{ ucwords($user->status) }}</span>
                     </td>
                     <td><i role="button" class="fa fa-edit fa-lg  openModal text-primary mx-2" data-title="Edit User"
                             data-url="{{ route('user.edit', $user->id) }}"></i> <i role="button"
                             class="fa fa-trash fa-lg  deleteHandler text-danger"
                             data-url="{{ route('user.destroy', $user->id) }}"></i></td>
                 </tr>
             @endforeach
         @else
             <tr>
                 <td colspan="6" class="text-center"><span class="text-secondary">No records found</span>
                 </td>
             </tr>
         @endif
     </tbody>
 </table>
