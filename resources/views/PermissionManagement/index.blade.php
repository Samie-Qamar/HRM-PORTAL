@extends('layouts.user_type.auth')

@section('content')
<div>
    <div class="card mb-4 mx-4">
        <div class="card-header pb-0">
            <div class="d-flex flex-row justify-content-between">
                <div>
                    <h5 class="mb-0">Manage Permissions</h5>
                </div>
                <button class="btn bg-gradient-primary btn-sm mb-0" type="button">Save</button>
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td class="ps-4">
                                    <p class="text-xs font-weight-bold mb-0">{{ ucfirst($permission->name) }}</p>
                                </td>
                                @foreach ($roles as $role)
                                    <td class="text-center">
                                        <input type="checkbox" name="permissions[{{ $role->id }}][{{ $permission->id }}]"
                                               @if($role->hasPermissionTo($permission->name)) checked @endif>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
