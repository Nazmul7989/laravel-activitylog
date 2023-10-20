<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="container mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card p-4">
                    <div class="d-flex justify-content-between mb-3">
                        <h5>Edit User</h5>
                        <a href="{{ route('users.index') }}" class="btn btn-primary">Back</a>
                    </div>
                    <form action="{{ route('users.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Enter name">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="example@example.com">
                            </div>
                            <div class="col-md-6 mb-3">
                                <input type="password" name="password" class="form-control" placeholder="********">
                            </div>
                            <div class="mt-3">
                                <button type="submit" class="btn btn-primary bg-primary">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
