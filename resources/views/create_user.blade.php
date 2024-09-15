<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Create User</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2e2e2e;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: #ddd;
        }

        h1 {
            color: #fff;
            margin-bottom: 20px;
        }

        form {
            background: #fff;
            color: #333;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            background-color: #f4f4f9;
            color: #333;
        }

        button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <h1>Buat Profile Anda</h1>
    <form action="{{ route('user.store') }}" method="POST">
        @csrf
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>
        <br>
        <label for="npm">NPM:</label>
        <input type="text" id="npm" name="npm" required>
        <br>
        <label for="kelas">Kelas:</label>
        <input type="text" id="kelas" name="kelas" required>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>

</html>
