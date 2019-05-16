@foreach ($reports as $report)
<p id = "question" data-question = "{{ $question->id }}">
    <input id="poll-{{ $report->id }}" name="report-radio" type="radio" value="{{ $report->id }}">
    <label for="poll-{{ $report->id }}">{{ $report->title }}</label>
</p>
@endforeach
