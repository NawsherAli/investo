<div>
    <table class="table">
        <!-- Table Header -->
        <thead>
            <tr>
                <th>Driver Name</th>
                <th>Driver Email</th>
                <th>Driver Address</th>
                <th>Driver Phone</th>
                <th>Driver Vehicle</th>
                <th>Vehicle Number Plate</th>
                <th>Actions</th>
            </tr>
        </thead>
        <!-- Table Body -->
        <tbody>
            @foreach ($drivers as $driver)
                <tr>
                    <td>{{ $driver->driver_name }}</td>
                    <td>{{ $driver->driver_email }}</td>
                    <td>{{ $driver->driver_address }}</td>
                    <td>{{ $driver->driver_phone }}</td>
                    <td>{{ $driver->driver_vehical }}</td>
                    <td>{{ $driver->vehical_number_plate }}</td>
                    <td>
                        <!-- Add links or buttons for actions (Edit, Delete, etc.) -->
                        <!-- Example Edit Link -->
                        <a href="{{ route('drivers.edit', $driver->id) }}">Edit</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination Links -->
    {{ $drivers->links() }}
</div>
