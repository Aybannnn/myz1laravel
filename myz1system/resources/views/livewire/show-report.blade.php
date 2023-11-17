<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div class="container" style="margin-top: 2rem;">
        <div class="row">
        @foreach($postreport as $post)
            <div class="col-4">
                <div class="card" style="text-align: center; padding: 2rem; margin: 1rem;">
                    <h2 style="margin-right: 2rem; margin-left: 2rem;">Report No. {{$post->id}}</h2>
                    <p>By {{$post->client_office}}</p>
                    <h6>Information sa Report</h6>
                    <form action="{{ route('update-status', ['id' => $post->id]) }}" method="post">
                        @csrf
                        <select name="report_status" class="form-control d-grid mx-auto" style="text-align: center; display: flex; margin-bottom: 1.4rem;">
                            <option @if($post->report_status == '1') selected @endif value="1">Waiting for Approval</option>
                            <option @if($post->report_status == '2') selected @endif value="2">Under Review</option>
                            <option @if($post->report_status == '3') selected @endif value="3">Report Accepted</option>
                            <option @if($post->report_status == '4') selected @endif value="4">Under Maintenance</option>
                            <option @if($post->report_status == '5') selected @endif value="5">Report Resolved</option>
                        </select>
                        <button type="submit" class="btn btn-success d-grid col-6 mx-auto">Update Status</button>
                    </form>
                </div>
            </div>
        @endforeach
        </div>
    </div>
</div>
