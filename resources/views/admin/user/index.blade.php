<x-admin-layout>
    
    @if(session()->has('status'))
        <div class="alert alert-success">
            {{ session()->get('status') }}
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table style="width:100%">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Action</th>
                    </tr>
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                            @foreach($user->roles as $role) 
                                <span class="badge bg-primary">{{ $role->name }}</span>
                            @endforeach
                            </td>                
                            <td>
                                <button type="button" class="badge text-bg-warning">Assign a role</button>
                            </td>
                            <td>
                                <button type="button" class="badge text-bg-info">Edit User</button>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}" onsubmit="return confirm('Are you sure?')">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="badge text-bg-danger">Delete</button>
                                </form>
                            </td>    
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</x-admin-layout>