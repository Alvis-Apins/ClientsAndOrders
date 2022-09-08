<x-layout>
    <div class="grid grid-cols-2 divide-x">
        <!--left side-->
        <div>
            <div class="m-20">
                <table class="min-w-full">
                    <thead class="bg-gray-400 opacity-75 border-b text-white">
                    <tr>
                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                            #
                        </th>
                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                            Klienti
                        </th>
                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                            Adreses
                        </th>
                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                            Piegādes
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr class="bg-white border-b border-gray-400">
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $client->id }} </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900"> {{ $client->name }} </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <form>
                                    {{csrf_field()}}
                                    <button class="bg-green-800 text-white px-2 rounded text-lg transition" type="button"
                                            onclick="showAddresses({{ $client->id }})">
                                        Adreses
                                    </button>
                                </form>


                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                <form action="{{ route('deliveries') }}" method="POST">
                                    @csrf
                                    <div class="flex">
                                        <input type="hidden" id="client" name="client" value="{{ $client->id }}">
                                        <button class="bg-green-800 text-white px-2 rounded text-lg" type="submit">Piegādes</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{ $clients->links() }}
            </div>
        </div>
        <!--right side-->
        <div>
            <div class="m-20">
                <table class="min-w-full">
                    <thead class="bg-gray-400 opacity-75 border-b text-white">
                    <tr>
                        <th scope="col" class="text-sm font-medium px-6 py-4 text-left">
                            Adreses
                        </th>
                    </tr>
                    </thead>
                    <tbody id="client_addresses" class="ajax-tbody"></tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        function showAddresses(client_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#client_addresses td').remove()
            $.ajax({
                url: "{{ route('clients-list') }}",
                method: "POST",
                data: {client_id: client_id},
                success: function (addresses) {
                    $.each(addresses, function (key, value) {
                        for (var i = 0; i < value.length; i++) {
                            $('#client_addresses').append("<tr><td>" + value[i].title + "</td></tr>")
                        }
                    })
                }
            });
        }
    </script>
</x-layout>
