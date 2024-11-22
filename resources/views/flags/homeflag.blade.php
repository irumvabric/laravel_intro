<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flag Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ddd;
        }

        th, td {
            text-align: left;
            padding: 8px;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {  
            background-color: #ddd;
        }

        h1 {
            text-align: center;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Flag Home</h1>
    @if (count($flags) > 0)
    <table>
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
            @foreach($flags as $flag)
                <tr>
                    <td>{{ $flag->id }}</td>
                    <td>{{ $flag->image }}</td>
                    <td>
                        <a href="/edflag/{{$flag->id}}">Edit</a>
                        <a
                        href="/delflag/{{$flag->id}}"
                        onclick="return confirm('Are you sure you want to delete flag?')"
                        >Delete</a>
                    </td>
                </tr>
            @endforeach
    </table>
    @else
        <p>No flags found.</p>
    @endif
</body>
</html>
