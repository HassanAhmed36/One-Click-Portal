<div class="modal-body" id="User-Data">
    @isset($UserData)
        <table class="table table-bordered">
            <thead class="bg-light">
                <tr>
                    <th>Order ID</th>
                    <th>Achieved word</th>
                    <th>Cancel word</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0; 
                @endphp
                @foreach ($UserData as $data)
                    <tr>
                        <td>{{ $data->order_info->Order_ID }}</td>
                        <td>{{ $data->achieved_word }}</td>
                        <td>{{ $data->cancel_word }}</td>
                    </tr>
                    @php
                        $total += $data->achieved_word;
                    @endphp
                @endforeach
                <tr class="bg-light">
                    <td >Total</td>
                    <td class="text-start" colspan="2">{{ $total }}</td>
                </tr>
            </tbody>
        </table>
    @else
        <p>No user data available.</p>
    @endisset
</div>
