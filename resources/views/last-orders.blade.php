<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-200">
@include('components.nav-bar')
<div>
    <div class="m-20">
        <table class="min-w-full">
            <thead class="bg-gray-400 opacity-75 border-b text-white">
            <tr>
                <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                    #
                </th>
                <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                    Klients
                </th>
                <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                    Adrese
                </th>
                <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                    Pasūtījuma datums
                </th>
                <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                    Pasūtījuma tips
                </th>
                <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                    Pasūtījuma summa
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr class="bg-white border-b border-gray-400">
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $loop->index+1 }} </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $client->getName() }} </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $client->getAddress() }} </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $client->getOrderDate() }} </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $client->getOrderType() }} </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $client->getOrderTotal() }} </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>



</body>
</html>
