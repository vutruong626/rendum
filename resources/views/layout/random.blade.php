<div class="row">
    <div class="col-md-3">
        <table class="table table-striped table-danger">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Prize</th>
                    <th>Amount</th>
                    <th>Prize structure</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($prize as $key => $item)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $item->prize }}</td>
                        <td>{{ $item->amount }}</td>
                        <td>{{ $item->prize_structure }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="col-md-6">

        <div class="text-center">
            <table class="table table-striped table-success">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Customer Code</th>
                        <th>Name</th>
                        <th>First Prize</th>
                    </tr>
                </thead>
                <tbody id="user_lucky">
                    @if(count($userPrizeFirst) > 0)
                        @foreach ($userPrizeFirst as $key => $value)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $value->code }}</td>
                                <td>{{ $value->username }}</td>
                                <td>mes</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-md-3">
        {{-- @include('layout.setting') --}}
    </div>
</div>
