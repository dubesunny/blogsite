 <table class="table" id="dataTable">
     <thead>
         <tr>
             <th scope="col">#
                 <span class="sort">
                     <i class="fa fa-sort-up sortHandle" role="button" data-field="id" data-order="asc"
                         data-url="{{ route('categorysort') }}"></i>
                     <i class="fa fa-sort-down sortHandle" role="button" data-field="id" data-order="desc"
                         data-url="{{ route('categorysort') }}"></i>
                 </span>
             </th>
             <th scope="col">Title
                 <span class="sort">
                     <i class="fa fa-sort-up sortHandle" role="button" data-field="title" data-order="asc"
                         data-url="{{ route('categorysort') }}"></i>
                     <i class="fa fa-sort-down sortHandle" role="button" data-field="title" data-order="desc"
                         data-url="{{ route('categorysort') }}"></i>
                 </span>
             </th>
             <th scope="col">Image</th>
             <th scope="col">Status</th>
             <th scope="col">Action</th>
         </tr>
     </thead>
     <tbody>
         @if (!$categories->isEmpty())
             @foreach ($categories as $category)
                 <tr>
                     <td>{{ $category->id }}</td>
                     <td>{{ $category->title }}</td>
                     <td><img src="{{ $category->image }}" alt="no-image" class="w-40" height="40px"></td>
                     <td><span
                             class="{{ $category->status == 'active' ? 'badge badge-success' : 'badge badge-danger' }}">{{ ucwords($category->status) }}</span>
                     </td>
                     <td><i role="button" class="fa fa-edit fa-lg openModal text-primary mx-2"
                             data-title="Edit Category" data-url="{{ route('category.edit', $category->id) }}"></i><i
                             role="button" class="fa fa-trash fa-lg text-danger deleteHandler"
                             data-url="{{ route('category.destroy', $category->id) }}"></i></td>
                 </tr>
             @endforeach
         @else
             <tr>
                 <td colspan="5" class="text-center"><span class="text-secondary">No records found</span>
                 </td>
             </tr>
         @endif
     </tbody>
 </table>
