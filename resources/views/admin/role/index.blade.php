<x-admin-layout>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <table style="width:100%">
                    <tr>
                        
                        <th>Roles</th>
                        
                    </tr>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            </td>                
                            <td>
                                <button type="button" class="badge text-bg-info">Edit Role</button>
                            </td>
                            <td>
                                <button type="button" class="badge text-bg-danger">Delete</button>
                            </td>    
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</x-admin-layout>