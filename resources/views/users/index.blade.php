

@section('title', 'users list')

<x-app-layout>
  <x-slot name="slot">
    <h2> search results </h2>

    <table class="table  table-light table-striped table-bordered">
      <thead class="table-dark">
        <tr>
          <th scope="col">avatar</th>
          <th scope="col">uername</th>
          <th scope="col">Actions</th>
        </tr>
      </thead>
      <tbody class="table-group-divider">
        
        @foreach($users as $user)
        
        <tr>
          <td scope="row"><img style="border-radius: 50%;display:inline;margin:10px;" src="{{ Storage::disk('public')->url($user['avatar'])}}" width="50px" height="50px"></td>
          <td>{{ $user['username'] }}</td>
          <td>
            <form action="{{route('users.show',['id'=>$user['id']])}}" method="get">
              @csrf
              <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">>view profile</button>
            </form>
          </td>
        </tr>
        @endforeach
        
      </tbody>
    </table>
    {{-- {{ $users->links() }} --}}
        
    

  </x-slot>
</x-app-layout>