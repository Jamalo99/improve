<div>
    <form action="" id="periodsQuestionForm">
        @foreach ($section['questions'] as $id => $question)
            @if ($question['display_order'] < 80)
            <div class="relative overflow-x-auto">
                <table name="period-question-table" data-id="{{ $question['id'] }}"
                    class="table table-bordered table-striped">
                    <thead>
                        @if ($controlKey->cadence->id === 6)
                            <tr>
                                <th scope="col" class="px-6 py-3"></th>
                                <th scope="col" class="px-6 py-3 text-center">
                                    {{ __('Year') }}
                                </th>
                            </tr>
                        @elseif ($controlKey->cadence->id === 5)
                            <tr>
                                <th scope="col" class="px-6 py-3"></th>
                                @foreach (['S1', 'S2'] as $month)
                                    <th scope="col" class="px-6 py-3 text-center">
                                        {{ $month }}
                                    </th>
                                @endforeach
                            </tr>
                        @elseif ($controlKey->cadence->id === 4)
                            <tr>
                                <th scope="col" class="px-6 py-3"></th>
                                @foreach (['Q1', 'Q2', 'Q3', 'Q4'] as $month)
                                    <th scope="col" class="px-6 py-3 text-center">
                                        {{ $month }}
                                    </th>
                                @endforeach
                            </tr>
                        @else
                            <tr>
                                <th class="border" scope="col" class="px-6 py-3"></th>
                                @foreach (['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Set', 'Ott', 'Nov', 'Dic'] as $month)
                                    <th scope="col" class="px-6 py-3 text-center">
                                        {{ $month }}
                                    </th>
                                @endforeach
                            </tr>
                        @endif
                    </thead>
                    <tbody>
                        <tr name="answer">
                            <th class="col-2 align-middle" scope="row">
                                {{ $question['title_' . session('language')] }}</th>
                            @if ($controlKey->cadence->id === 6)
                                <td class="align-middle" data-id="Year">
                                    <select name="answer" class="form-control">
                                        <option value=''>---</option>
                                        <option value='no'
                                            {{ $periodAnswer->where('period', 'Year')->where('question_id', $question['id'])->firstWhere('answer', 'no')? 'selected': '' }}>
                                            No</option>
                                        <option value='partial'
                                            {{ $periodAnswer->where('period', 'Year')->where('question_id', $question['id'])->firstWhere('answer', 'partial')? 'selected': '' }}>
                                            Partial</option>
                                        <option value='yes'
                                            {{ $periodAnswer->where('period', 'Year')->where('question_id', $question['id'])->firstWhere('answer', 'yes')? 'selected': '' }}>
                                            Yes</option>
                                    </select>
                                </td>
                            @elseif ($controlKey->cadence->id === 5)
                                @foreach (['S1', 'S2'] as $month)
                                    <td class="align-middle" data-id="{{ $month }}">
                                        <select name="answer" class="form-control">
                                            <option value=''>---</option>
                                            <option value='no'
                                                {{ $periodAnswer->where('period', $month)->where('question_id', $question['id'])->firstWhere('answer', 'no')? 'selected': '' }}>
                                                No</option>
                                            <option value='partial'
                                                {{ $periodAnswer->where('period', $month)->where('question_id', $question['id'])->firstWhere('answer', 'partial')? 'selected': '' }}>
                                                Partial</option>
                                            <option value='yes'
                                                {{ $periodAnswer->where('period', $month)->where('question_id', $question['id'])->firstWhere('answer', 'yes')? 'selected': '' }}>
                                                Yes</option>
                                        </select>
                                    </td>
                                @endforeach
                            @elseif ($controlKey->cadence->id === 4)
                                @foreach (['Q1', 'Q2', 'Q3', 'Q4'] as $month)
                                    <td class="align-middle" data-id="{{ $month }}">
                                        <select name="answer" class="form-control">
                                            <option value=''>---</option>
                                            <option value='no'
                                                {{ $periodAnswer->where('period', $month)->where('question_id', $question['id'])->firstWhere('answer', 'no')? 'selected': '' }}>
                                                No</option>
                                            <option value='partial'
                                                {{ $periodAnswer->where('period', $month)->where('question_id', $question['id'])->firstWhere('answer', 'partial')? 'selected': '' }}>
                                                Partial</option>
                                            <option value='yes'
                                                {{ $periodAnswer->where('period', $month)->where('question_id', $question['id'])->firstWhere('answer', 'yes')? 'selected': '' }}>
                                                Yes</option>
                                        </select>
                                    </td>
                                @endforeach
                            @else
                                @foreach (['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Set', 'Ott', 'Nov', 'Dic'] as $month)
                                    <td class="align-middle" data-id="{{ $month }}">
                                        <select name="answer" class="form-control">
                                            <option value=''>---</option>
                                            <option value='no'
                                                {{ $periodAnswer->where('period', $month)->where('question_id', $question['id'])->firstWhere('answer', 'no')? 'selected': '' }}>
                                                No</option>
                                            <option value='partial'
                                                {{ $periodAnswer->where('period', $month)->where('question_id', $question['id'])->firstWhere('answer', 'partial')? 'selected': '' }}>
                                                Partial</option>
                                            <option value='yes'
                                                {{ $periodAnswer->where('period', $month)->where('question_id', $question['id'])->firstWhere('answer', 'yes')? 'selected': '' }}>
                                                Yes</option>
                                        </select>
                                    </td>
                                @endforeach
                            @endif
                        </tr>
                        <tr name="impact">
                            <th class="col-2 align-middle" scope="row">{{ trans('cruds.impact.title') }}</th>
                            @if ($controlKey->cadence->id === 6)
                                <td class="align-middle" data-id="Year">
                                    <select name="impact" class="form-control">
                                        @foreach ($impacts as $id => $impact)
                                            <option value="{{ $id }}"
                                                {{ optional($periodAnswer->where('period', 'Year')->where('question_id', $question['id'])->first())->impact_id == $id? 'selected': '' }}>
                                                {{ $impact }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            @elseif ($controlKey->cadence->id === 5)
                                @foreach (['S1', 'S2'] as $month)
                                    <td class="align-middle" data-id="{{ $month }}">
                                        <select name="impact" class="form-control">
                                            @foreach ($impacts as $id => $impact)
                                                <option value="{{ $id }}"
                                                    {{ optional($periodAnswer->where('period', $month)->where('question_id', $question['id'])->first())->impact_id == $id? 'selected': '' }}>
                                                    {{ $impact }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                @endforeach
                            @elseif ($controlKey->cadence->id === 4)
                                @foreach (['Q1', 'Q2', 'Q3', 'Q4'] as $month)
                                    <td class="align-middle" data-id="{{ $month }}">
                                        <select name="impact" class="form-control">
                                            @foreach ($impacts as $id => $impact)
                                                <option value="{{ $id }}"
                                                    {{ optional($periodAnswer->where('period', $month)->where('question_id', $question['id'])->first())->impact_id == $id? 'selected': '' }}>
                                                    {{ $impact }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                @endforeach
                            @else
                                @foreach (['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Set', 'Ott', 'Nov', 'Dic'] as $month)
                                    <td class="align-middle" data-id="{{ $month }}">
                                        <select name="impact" class="form-control">
                                            @foreach ($impacts as $id => $impact)
                                                <option value="{{ $id }}"
                                                    {{ optional($periodAnswer->where('period', $month)->where('question_id', $question['id'])->first())->impact_id == $id? 'selected': '' }}>
                                                    {{ $impact }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                @endforeach
                            @endif

                        </tr>
                        <tr name="probability">
                            <th class="col-2 align-middle" scope="row">{{ trans('cruds.probability.title') }}</th>
                            @if ($controlKey->cadence->id === 6)
                                <td class="align-middle" data-id="Year">
                                    <select name="probability" class="form-control">
                                        @foreach ($probabilities as $id => $probability)
                                            <option value="{{ $id }}"
                                                {{ optional($periodAnswer->where('period', 'Year')->where('question_id', $question['id'])->first())->probability_id == $id? 'selected': '' }}>
                                                {{ $probability }}</option>
                                        @endforeach
                                    </select>
                                </td>
                            @elseif ($controlKey->cadence->id === 5)
                                @foreach (['S1', 'S2'] as $month)
                                    <td class="align-middle" data-id="{{ $month }}">
                                        <select name="probability" class="form-control">
                                            @foreach ($probabilities as $id => $probability)
                                                <option value="{{ $id }}"
                                                    {{ optional($periodAnswer->where('period', $month)->where('question_id', $question['id'])->first())->probability_id == $id? 'selected': '' }}>
                                                    {{ $probability }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                @endforeach
                            @elseif ($controlKey->cadence->id === 4)
                                @foreach (['Q1', 'Q2', 'Q3', 'Q4'] as $month)
                                    <td class="align-middle" data-id="{{ $month }}">
                                        <select name="probability" class="form-control">
                                            @foreach ($probabilities as $id => $probability)
                                                <option value="{{ $id }}"
                                                    {{ optional($periodAnswer->where('period', $month)->where('question_id', $question['id'])->first())->probability_id == $id? 'selected': '' }}>
                                                    {{ $probability }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                @endforeach
                            @else
                                @foreach (['Gen', 'Feb', 'Mar', 'Apr', 'Mag', 'Giu', 'Lug', 'Ago', 'Set', 'Ott', 'Nov', 'Dic'] as $month)
                                    <td class="align-middle" data-id="{{ $month }}">
                                        <select name="probability" class="form-sm-control">
                                            @foreach ($probabilities as $id => $probability)
                                                <option value="{{ $id }}"
                                                    {{ optional($periodAnswer->where('period', $month)->where('question_id', $question['id'])->first())->probability_id == $id? 'selected': '' }}>
                                                    {{ $probability }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                @endforeach
                            @endif

                        </tr>
                    </tbody>
                </table>
            </div>
        @endif
        @endforeach
    </form>
</div>
