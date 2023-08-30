<!DOCTPE html>
<html>
<head>
    <title>View Student Records</title>
</head>
<body>
<table border = "1">
    <tr>
        <td>start_location</td>
        <td>end_location</td>
    </tr>
    @foreach ($tripInfos as $user)
        <tr>
            <td>{{ $user->start_location }}</td>
            <td>{{ $user->end_location }}</td>
        </tr>
    @endforeach
</table>
</body>
</html>
