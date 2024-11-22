<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flag Home</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1{
            text-align: center;
        }
        form {
            width: 50%;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Edit flag page</h1>
    <form action="/edflag/{{$flag->id}}" method="post">
        @csrf
        @method('PUT')

        <label for="nom_senateur">Image:</label>
        <input type="file" id="image" name="image" value={{$flag->image}}">
        @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror

        <button type="submit">Submit</button>
        <button type="reset">Cancel</button>
    </form>
</body>
</html>
