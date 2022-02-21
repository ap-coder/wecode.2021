<div class="blog-form mt-6">
    <h4 class="mb-3">Reply On</h4>
    <div class="gray-form">
        <form action="{{ route('discuss.storeReply') }}" method="POST">
            @method('POST')
            @csrf

            <input type="hidden" name="best_answer" value="0">
            <input type="hidden" name="author_id" value="{{ @ auth()->user()->id}}">
            <input type="hidden" name="thread_id" value="{{ $threadID }}">
                <div class="form-group col-md-12">
                    <textarea class="form-control" rows="7" placeholder="Message" name="content_area"></textarea>
                </div>
            {{-- <div class="form-group col-md-12">
                <label for="attachments">{{ trans('cruds.thread.fields.attachments') }}</label>
                <div class="needsclick dropzone {{ $errors->has('attachments') ? 'is-invalid' : '' }}" id="attachments-dropzone">
                </div>
                @if($errors->has('attachments'))
                <span class="text-danger">{{ $errors->first('attachments') }}</span>
                @endif
            </div> --}}
            <div class="col-md-12">
                <button type="submit" class="button red text-uppercase btn-lg px-5">
                    SUBMIT
                  </button>
            </div>
        </form>
    </div>
</div>

