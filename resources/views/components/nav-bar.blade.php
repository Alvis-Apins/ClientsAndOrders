<nav class="py-4">
    <div class="px-8 bg-gray-400 h-16">
        <div class="flex justify-between">
            <!-- navbar left side -->
            <div class="flex m-6">
                <a class="mx-4" href="{{ url('/clients-list') }}">Klientu saraksts</a>
                <a class="mx-4" href="{{ url('/clients-deliveries') }}">Klientu piegādes</a>
            </div>
            <!-- nav bar right side -->
            <div class="flex m-6">
                <a class="mx-4" href="{{ url('/order-type-report') }}">Pasūtījumu tipi</a>
                <a class="mx-4" href="{{ url('/last-orders-report') }}">Pēdējā piegāde</a>
                <a class="mx-4" href="{{ url('/inactive-clients-report') }}">Neaktīvie klienti</a>
            </div>
        </div>
    </div>
</nav>
