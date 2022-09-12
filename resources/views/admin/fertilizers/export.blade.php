<table>
    <thead>
    <tr>
        <th>id</th>
        <th>Наименование</th>
        <th>Норма Азот</th>
        <th>Норма Фосфор</th>
        <th>Норма Калий</th>
        <th>Группа культур</th>
        <th>Район</th>
        <th>Стоимость</th>
        <th>Описание</th>
        <th>Назначение</th>
    </tr>
    </thead>
    <tbody>
    @foreach($fertilizers as $fertilizer)
        <tr>
            <td>{{ $fertilizer->id }}</td>
            <td>{{ $fertilizer->name }}</td>
            <td>{{ $fertilizer->nitrogen }}</td>
            <td>{{ $fertilizer->phosphorus }}</td>
            <td>{{ $fertilizer->potassium }}</td>
            <td>{{ $fertilizer->culture->name }}</td>
            <td>{{ $fertilizer->district }}</td>
            <td>{{ $fertilizer->price }}</td>
            <td>{{ $fertilizer->description }}</td>
            <td>{{ $fertilizer->target }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
