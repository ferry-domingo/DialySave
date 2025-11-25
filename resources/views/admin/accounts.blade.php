<x-app-layout>
@role('admin')
    <div>
       @can ('add users')
            <a href="{{route('users.create')}}">add user</a>
        @endcan
          @can ('view users')
            <a href="{{route('users.index')}}">view users</a>
        @endcan
    </div>
@endrole
</x-app-layout>