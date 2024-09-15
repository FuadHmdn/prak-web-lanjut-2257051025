<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #2e2e2e;
            color: #ddd;
        }

        .profile-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        img {
            border-radius: 50%;
            width: 160px;
            height: 160px;
            object-fit: cover;
        }

        p {
            background-color: #f4f4f9;
            font-size: 20px;
            margin: 10px 0;
            padding: 10px;
            border-radius: 8px;
            color: #333;
        }
    </style>
</head>

<body>

    <div class="profile-container">
        <img src="https://media.licdn.com/dms/image/v2/D5603AQFlPkvSgGhTGw/profile-displayphoto-shrink_200_200/profile-displayphoto-shrink_200_200/0/1719026457744?e=2147483647&v=beta&t=po9_V9fcWCZALyGvmEdo8xbPD1cOmGk9GVMlAMDsiTQ" alt="Profile Picture">
        <p>Nama: {{ $nama }}</p>
        <p>Kelas: {{ $kelas }}</p>
        <p>NPM: {{ $npm }}</p>
    </div>

</body>

</html>