<x-app-layout>
@role('admin')
    <div>
         @can ('add patients')
            <a href="{{route('patients.create')}}">add patients</a>
        @endcan
            @can ('view patients')
            <a href="{{route('patients.index')}}">view patients</a>
        @endcan
    </div>  
   
@endrole

@role('patient')
<h1>you r patient</h1>
@endrole
</x-app-layout>
