<div class="card">
    <div class="card-header cursor-pointer" data-toggle="collapse" data-target="#collapseSectionTwo" aria-expanded="false"
        style="cursor: pointer;" aria-controls="collapseSectionTwo">
        {{ trans('formulary.controlKey.section.causes-of-risk.title') }}
    </div>
    <div class="collapse" id="collapseSectionTwo">
        <div class="card-body">
            <form id="updateControlKeySectionTwo" method="POST"
                action="{{ route('frontend.question-answers.update') }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <input type="hidden" name="controlKeyId" value="{{ $controlKey->id }}">

                <div class="container-fluid">
                    @foreach ($questionsBySection as $sectionId => $sectionQuestions)
                        @if ($sectionId === 'section 2')
                            @foreach ($sectionQuestions as $question)
                                <div class="form-group flex-fill">
                                    <label for="title">{{ $question['title'] }}.</label>
                                    <textarea name="{{$question['id']}}" class="form-control" placeholder="{{ trans('global.writeHere') }}" style="height: 100px">@if(isset($question['answers']) && isset($question['answers'][0])){{ $question['answers'][0] }}@endif</textarea>
                                    @if ($errors->has('title'))
                                        <div class="invalid-feedback">
                                            {{ $errors->first('title') }}
                                        </div>
                                    @endif
                                    <span class="help-block">{{ trans('cruds.controlKey.fields.title_helper') }}</span>
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                    <div class="form-group d-flex justify-content-end align-items-center">
                        <svg id="checkSectionTwo" xmlns="http://www.w3.org/2000/svg" width="26" height="26"
                            fill="green" class="bi bi-check-circle mr-4" style="display: none;" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                            <path
                                d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                        </svg>
                        <button class="btn btn-dark" type="submit">
                            {{ trans('global.save') }}
                        </button>
                    </div>
                    <div id="updateDateSectionTwo" class="d-flex justify-content-end" style="display: none;"><span
                            id="savedTimeSectionTwo"></span>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        //Save header
        $('#updateControlKeySectionTwo').on('submit', function(event) {
            event.preventDefault();

            $('#checkSectionTwo').hide();
            $('#updateDateSectionTwo').hide()
            ;

            jQuery.ajax({
                url: "{{ route('frontend.question-answers.update')}}",
                data: jQuery('#updateControlKeySectionTwo').serialize() + "&_token={{ csrf_token() }}",
                type: 'PUT',

                success: function() {
                    // Show the SVG on success
                    $('#checkSectionTwo').show();

                    // Get the current timestamp
                    var saveTime = Date.now();

                    // Set the value of hidden input and update displayed time
                    $('#savedTimeSectionTwo').val(saveTime);
                    $('#savedTimeSectionTwo').text(new Date(saveTime).toLocaleString());

                    $('#updateDateSectionTwo').show();

                    $('.text-red-500').text(
                        ""); // Hide all elements with class 'text-red-500'
                },
                error: function(xhr, status, error) {
                    // Se la richiesta fallisce...
                    var errors = xhr.responseJSON.errors;

                    // Mostrare i messaggi di errore
                    $.each(errors, function(key, value) {
                        $('#' + key + '_error').text(value[0]);
                    });
                }
            });
        });

    });
</script>
