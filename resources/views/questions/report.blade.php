<h2>{{ __('Report') }}<i class="icon-remove"></i></h2>
<div class="form-style form-style-3">
    <form>
        <div class="form-inputs clearfix">
            <p>
                <label class="required">{{ __('Reason for reporting this content') }} :<span>*</span></label>
                @foreach ($reports as $report)
                <p>
                <input id="poll-{{ $report->id }}" name="poll-radio" type="radio">
                <label for="poll-{{ $report->id }}">{{ $report->title }}</label>
                </p>
                @endforeach
            </p>
            <p>
                <label class="required">{{ __('Comment') }} :<span>*</span></label>
                <textarea name="" id="" cols="30" rows="5" placeholder="{{ __('Comment') }}"></textarea>
            </p>
        </div>
        <p class="form-submit">
            <input type="submit" value="{{ __('Report') }}" class="button color small submit">
        </p>
    </form>
    <div class="clearfix"></div>
</div>
