 <table class="table" id="dataTable">
     <thead>
         <tr>
             <th scope="col">#
                 <span class="sort">
                     <i class="fa fa-sort-up sortHandle" role="button" data-field="id" data-order="asc"
                         data-url="{{ route('usersort') }}"></i>
                     <i class="fa fa-sort-down sortHandle" role="button" data-field="id" data-order="desc"
                         data-url="{{ route('usersort') }}"></i>
                 </span>
             </th>
             <th scope="col">Name
                 <span class="sort">
                     <i class="fa fa-sort-up sortHandle" role="button" data-field="name" data-order="asc"
                         data-url="{{ route('usersort') }}"></i>
                     <i class="fa fa-sort-down sortHandle" role="button" data-field="name" data-order="desc"
                         data-url="{{ route('usersort') }}"></i>
                 </span>
             </th>
             <th scope="col">Email
                 <span class="sort">
                     <i class="fa fa-sort-up sortHandle" role="button" data-field="email" data-order="asc"
                         data-url="{{ route('usersort') }}"></i>
                     <i class="fa fa-sort-down sortHandle" role="button" data-field="email" data-order="desc"
                         data-url="{{ route('usersort') }}"></i>
                 </span>
             </th>
             <th scope="col">Phone
                 <span class="sort">
                     <i class="fa fa-sort-up sortHandle" role="button" data-field="phone" data-order="asc"
                         data-url="{{ route('usersort') }}"></i>
                     <i class="fa fa-sort-down sortHandle" role="button" data-field="phone" data-order="desc"
                         data-url="{{ route('usersort') }}"></i>
                 </span>
             </th>
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
