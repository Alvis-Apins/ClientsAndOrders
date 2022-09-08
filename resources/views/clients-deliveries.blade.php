<x-layout>
    <div class="grid grid-cols-2 divide-x">
        <!--left side-->
        <div>
            <div class="m-20">
                <table class="min-w-full">
                    <thead class="bg-gray-400 opacity-75 border-b text-white">
                    <tr>
                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                            #ID
                        </th>
                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                            Klients
                        </th>
                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                            Telefona Nr.
                        </th>
                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                            Epasts
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr class="bg-white border-b border-gray-400">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $client->id }} </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $client->name }} </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $client->phone }} </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $client->email }} </td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!--right side-->
        <div>
            <div class="m-20">
                <table class="min-w-full">
                    <thead class="bg-gray-400 opacity-75 border-b text-white">
                    <tr>
                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                            #
                        </th>
                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                            Adrese
                        </th>
                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                            Piegādes Datums
                        </th>
                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                            Pasūtījuma Summa
                        </th>
                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                            Statuss
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($deliveries as $delivery)
                        <tr class="bg-white border-b border-gray-400">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $loop->index }} </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $delivery->getAddress() }} </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $delivery->getDate() }} </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $delivery->getTotal() }} </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $delivery->getStatus() }} </td>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout>
