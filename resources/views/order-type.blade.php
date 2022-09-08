<x-layout>
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
                </tr>
                </thead>
                <tbody>
                @foreach($clients as $client)
                    <tr class="bg-white border-b border-gray-400">
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $loop->index+1 }} </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $client->getName() }} </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $client->getAddress() }} </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-layout>
