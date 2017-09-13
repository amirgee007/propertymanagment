<div class="panel-body no-padding">
    <div class="col-lg-12" style="padding: 5px">
        <div class="table-responsive">
            <table class="table" id="previousReading">
                <thead>
                <tr>
                    <th>Month</th>
                    <th>Reading Date</th>
                    <th>Previous Reading</th>
                    <th>Current Reading</th>
                    <th>Usage</th>
                    <th>Amount (RM)</th>
                </tr>
                </thead>
                <tbody>
                @foreach($data as $datum)
                    <tr>
                        <td>{{$datum['month']}}</td>
                        <td>{{$datum['reading_date']}}</td>
                        <td>{{$datum['previous']}}</td>
                        <td>{{$datum['current']}}</td>
                        <td>{{$datum['usage']}}</td>
                        <td>{{$datum['amount']}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
