<x-app-layout>
@role('admin')
    <div>
       @can ('add dialysis_session')
            <a href="{{route('sessions.create')}}">add Dialysis Session</a>
        @endcan
          @can ('view dialysis_session')
            <a href="{{route('sessions.index')}}">view Dialysis Session</a>
        @endcan
    </div>
@endrole
</x-app-layout>