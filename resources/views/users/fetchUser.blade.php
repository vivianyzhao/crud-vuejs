@extends('layouts/app')

@section('title', 'Users')

@section('sidebar')
    @parent
    <nav>
        <ul>
            <li>1</li>
            <li>2</li>
            <li>3</li>
            <li>4</li>
            <li>5</li>
            <li>6</li>
        </ul>
    </nav>
@endsection

@section('content')

    <h2>Crud With Vue JS</h2>
    <div id="UserController">

        <div class="alert alert-danger" v-if="!isValid">
            <ul>
                <li v-show="!validation.name">Name cannot be blank!</li>
                <li v-show="!validation.email">Email address is invalid!</li>
            </ul>
        </div>

        <form action="#" @submit.prevent="addNewUser">
            <div class="form-group">
                <label for="name">Name: </label>
                <input v-model="newUser.name" type="text" class="form-control" name="name" id="name">
            </div>
            <div class="form-group">
                <label for="email">Email: </label>
                <input v-model="newUser.email" type="text" class="form-control" name="email" id="email">
            </div>
            <div class="form-group">
                <label for="address">Address: </label>
                <input v-model="newUser.address" type="text" class="form-control" name="address" id="address">
            </div>
            <div class="form-group">
                <label for="phone">Phone: </label>
                <input v-model="newUser.phone" type="text" class="form-control" name="phone" id="phone">
            </div>
            <div class="form-group">
                <button :disabled="!isValid" type="submit" class="btn btn-primary" v-if="!edit">添加用户</button>
                <button :disabled="!isValid" type="submit" class="btn btn-primary" v-if="edit" @click="editUser(newUser.id)">Update</button>
            </div>
        </form>

        <div class="alert alert-success" transition="success" v-if="success">Updated successfully.</div>

        <hr>

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Edit</th>
                </tr>
            </thead>

            <tbody>
                <tr v-for="user in users">
                    <td>@{{ user.id }}</td>
                    <td>@{{ user.name }}</td>
                    <td>@{{ user.email }}</td>
                    <td>@{{ user.address }}</td>
                    <td>@{{ user.phone }}</td>
                    <td>
                        <button class="btn btn-sm btn-primary" @click="showUser(user.id)">
                            Edit
                        </button>
                        <button class="btn btn-sm btn-danger" @click="deleteUser(user.id)">
                            Delete
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

@endsection

@push('scripts')

    <script src="/js/user.js"></script>

    <style type="text/css">
        .success-transition {
            transition: all .5s ease-in-out
        }
        .success-enter, .success-leave {
            opacity: 0
        }
    </style>

@endpush