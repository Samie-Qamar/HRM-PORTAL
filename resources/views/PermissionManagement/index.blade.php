@extends('layouts.user_type.auth')

@section('content')

@if(session('success'))
<div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success" role="alert">
<span class="alert-text text-white">
{{ session('success') }}</span>
<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
 <i class="fa fa-close" aria-hidden="true"></i>
 </button>
</div>
@endif
<div>
    <div class="card mb-4 mx-4">
        <div class="card-header pb-0">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="mb-0">Manage Permissions</h5>
                </div>
                
                <a class="btn bg-gradient-primary btn-sm mb-0" href="{{route('show.create.permission')}}">Add Permission</a>
              
            </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                    <thead>
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">User Permission</th>
                            @foreach ($roles as $role)
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                    Role {{ $role->name }}
                                </th>
                            @endforeach

                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Select User

                            </th>

                            
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                Update  Permission

                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        
                            
                        @foreach ($permissions as $permission)
                        <form method="POST" action="{{route('update.permission', ['id'=>$permission->id])}}">
                            @csrf
                            <tr>
                                <td class="ps-4">
                                    
                                    <p class="text-xs font-weight-bold mb-0">{{ ucfirst($permission->name) }}</p>
                                </td>
                                @foreach ($roles as $role)
                                
                                    <td class="text-center">
                                    <input type="checkbox" 
                                    name="role[]"
                                    id="{{ $role->id }}"
                                    value="{{$role->id}}"
                                    @if($role->hasPermissionTo($permission->name)) checked @endif>
                                    </td>
                                @endforeach

                                <td class="ps-4">
                                    <select class="form-select" name="user_id">
                                    <option selected disabled>Select a User</option>
                                    @foreach ($users as $user)
                                      <option value="{{$user->id? $user->id:''}}">{{$user->name? $user->name:''}}</option>
                                      @endforeach  


                                    </select>
                                </td>
                                

                                <td class="ps-4">
                                <input type="submit" class="btn btn-success" value="Update Permission"/>
                                    
                                </td>
                            </tr>
                            </form>
                        @endforeach

                   
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
