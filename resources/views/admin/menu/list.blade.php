
@extends('admin.main')


@section('content')
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tên Danh Mục</th>
                <th scope="col">Kích Hoạt</th>
                <th scope="col">Cập nhật</th>
                <th scope="col" style="width: 100px;">&nbsp;</th>
            </tr>
        </thead>

        <tbody>
            {!! \App\Helpers\Helper::menu($menus) !!}
        </tbody>

    </table>
@endsection
