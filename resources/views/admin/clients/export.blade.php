<table>
    <thead>
    <tr>
        <th>id</th>
        <th>Наименование</th>
        <th>Дата договора</th>
        <th>Стоимость поставки</th>
        <th>Регион</th>
    </tr>
    </thead>
    <tbody>
    @foreach($clients as $client)
        <tr>
            <td>{{ $client->id }}</td>
            <td>{{ $client->name }}</td>
            <td>{{ $client->date }}</td>
            <td>{{ $client->price }}</td>
            <td>{{ $client->region }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
