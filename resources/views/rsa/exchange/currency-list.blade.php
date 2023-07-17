@extends("layouts.admin")
@section('title')
    Admin Panel
@endsection
@section("css")
@endsection

@section("content")

    <x-bootstrap.table
        :class="'table-responsive table table-hover'"
        :is-responsive="1"
    >
        <x-slot:columns>
            <th>Döviz Adı</th>
            <th>Döviz Kodu</th>
            <th>Alış Kuru</th>
            <th>Satış Kuru</th>
            <th>Güncellenme Tarihi</th>
        </x-slot:columns>
        <x-slot:rows>
            @foreach($history as $item)
                <tr>

                    <td>{{ $item->name }}</td>
                    <td>{{ $item->currency_code }}</td>
                    <td>{{ $item->buying_rate }}</td>
                    <td>{{ $item->selling_rate }}</td>
                    <td>{{ $item->updated_at }}</td>
                </tr>
            @endforeach
        </x-slot:rows>
    </x-bootstrap.table>

@endsection

@section("js")

@endsection
