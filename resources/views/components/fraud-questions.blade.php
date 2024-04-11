<div>
    @foreach ($section['questions'] as $id => $question)
        @if ($question['display_order'] == 80)
            <label for="">{{ $question['title_' . session('language')] }}</label>
            <table name="fraud-question-table" data-id="{{$question['id']}}" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="px-6 py-3 col-8">
                            {{ trans('Questions') }}
                        </th>
                        <th scope="col" class="px-6 py-3 col-4">
                            {{ trans('Answers') }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($fraudAnswers as $id => $fraudAnswer)
                        <tr data-id="{{$fraudAnswer->fraud_question_id}}">
                            <td>{{ $fraudAnswer['title_' . session('language')] }}</td>
                            <td data-id="{{$fraudAnswer->id}}">
                                @if ($fraudAnswer['type_answer'] === 'Hierarchy')
                                    <select name="hierarchy" class="form-control">
                                        <option value=''>---</option>
                                        <option value='Operational resources' {{ $fraudAnswer->answer == 'Operational resources' ? 'selected' : '' }}>{{ trans('select.operational_resources') }}
                                        </option>
                                        <option value='Managers' {{ $fraudAnswer->answer == 'Managers' ? 'selected' : '' }}>{{ trans('select.managers') }}</option>
                                        <option value='Owners/Executives' {{ $fraudAnswer->answer == 'Owners/Executives' ? 'selected' : '' }}>{{ trans('select.owners_executives') }}</option>
                                    </select>
                                @elseif($fraudAnswer['type_answer'] === 'Fraud')
                                    <select name="fraud" class="form-control">
                                        <option value=''>---</option>
                                        <option value="Corruption-Conflicts of interest" {{ $fraudAnswer->answer == 'Corruption-Conflicts of interest' ? 'selected' : '' }}>
                                            {{ trans('select.corruption_conflicts_of_interest') }}</option>
                                        <option value="Corruption-Actual corruption" {{ $fraudAnswer->answer == 'Corruption-Actual corruption' ? 'selected' : '' }}>
                                            {{ trans('select.corruption_actual_corruption') }}</option>
                                        <option value="Corruption-Unjustified gratuities" {{ $fraudAnswer->answer == 'Corruption-Unjustified gratuities' ? 'selected' : '' }}>
                                            {{ trans('select.corruption_unjustified_gratuities') }}</option>
                                        <option value="Corruption-Economic extortion" {{ $fraudAnswer->answer == 'Corruption-Economic extortion' ? 'selected' : '' }}>
                                            {{ trans('select.corruption_economic_extortion') }}</option>
                                        <option value="Misappropriation of funds-Money-Theft of cash" {{ $fraudAnswer->answer == 'Misappropriation of funds-Money-Theft of cash' ? 'selected' : '' }}>
                                            {{ trans('select.misappropriation_theft_of_cash') }}</option>
                                        <option
                                            value="Misappropriation of funds-Money-Revenue-Tampering with automatic devices" {{ $fraudAnswer->answer == 'Misappropriation of funds-Money-Revenue-Tampering with automatic devices' ? 'selected' : '' }}>
                                            {{ trans('select.misappropriation_tampering_with_automatic_devices') }}</option>
                                        <option value="Misappropriation of funds-Money-Revenue-Theft in cash" {{ $fraudAnswer->answer == 'Misappropriation of funds-Money-Revenue-Theft in cash' ? 'selected' : '' }}>
                                            {{ trans('select.misappropriation_theft_in_cash') }}</option>
                                        <option
                                            value="Misappropriation of funds-Money-Fraudulent disbursement-Overbilling" {{ $fraudAnswer->answer == 'Misappropriation of funds-Money-Fraudulent disbursement-Overbilling' ? 'selected' : '' }}>
                                            {{ trans('select.misappropriation_overbilling') }}</option>
                                        <option
                                            value="Misappropriation of funds-Money-Fraudulent disbursement-Payment of workers" {{ $fraudAnswer->answer == 'Misappropriation of funds-Money-Fraudulent disbursement-Payment of workers' ? 'selected' : '' }}>
                                            {{ trans('select.misappropriation_payment_of_workers') }}</option>
                                        <option
                                            value="Misappropriation of funds-Money-Fraudulent disbursement-Expense reimbursement" {{ $fraudAnswer->answer == 'Misappropriation of funds-Money-Fraudulent disbursement-Expense reimbursement' ? 'selected' : '' }}>
                                            {{ trans('select.misappropriation_expense_reimbursement') }}</option>
                                        <option
                                            value="Misappropriation of funds-Money-Fraudulent disbursement-Check forgery" {{ $fraudAnswer->answer == 'Misappropriation of funds-Money-Fraudulent disbursement-Check forgery' ? 'selected' : '' }}>
                                            {{ trans('select.misappropriation_check_forgery') }}</option>
                                        <option
                                            value="Misappropriation of funds-Money-Fraudulent disbursement-Subtraction of sums already recorded in the registers" {{ $fraudAnswer->answer == 'Misappropriation of funds-Money-Fraudulent disbursement-Subtraction of sums already recorded in the registers' ? 'selected' : '' }}>
                                            {{ trans('select.misappropriation_subtraction_of_sums_already_recorded') }}
                                        </option>
                                        <option value="Balance Sheet Fraud-Overstatement of assets or revenues" {{ $fraudAnswer->answer == 'Balance Sheet Fraud-Overstatement of assets or revenues' ? 'selected' : '' }}>
                                            {{ trans('select.balance_sheet_overstatement_of_assets_or_revenues') }}</option>
                                        <option value="Balance Sheet Fraud-Understatement of assets or revenues" {{ $fraudAnswer->answer == 'Balance Sheet Fraud-Understatement of assets or revenues' ? 'selected' : '' }}>
                                            {{ trans('select.balance_sheet_understatement_of_assets_or_revenues') }}</option>
                                        <option value="Non-financial in nature">{{ trans('select.non_financial_in_nature') }}
                                        </option>
                                    </select>
                                @elseif($fraudAnswer['type_answer'] === 'Organisation')
                                    <select name="organisation" class="form-control">
                                        <option value=''>---</option>
                                        <option value="Micro-enterprises (1 to 9 employees)" {{ $fraudAnswer->answer == 'Micro-enterprises (1 to 9 employees)' ? 'selected' : '' }}>
                                            {{ trans('select.micro-enterprises_1_to_9_employees') }}</option>
                                        <option value="Small enterprises (10 to 49 employees)" {{ $fraudAnswer->answer == 'Small enterprises (10 to 49 employees)' ? 'selected' : '' }}>
                                            {{ trans('select.small_enterprises_10_to_49_employees') }}</option>
                                        <option value="Medium enterprises (50 to 249 employees)" {{ $fraudAnswer->answer == 'Medium enterprises (50 to 249 employees)' ? 'selected' : '' }}>
                                            {{ trans('select.medium_enterprises_50_to_249_employees') }}</option>
                                        <option value="Large enterprises (250 employees and more)" {{ $fraudAnswer->answer == 'Large enterprises (250 employees and more)' ? 'selected' : '' }}>
                                            {{ trans('select.large_enterprises_250_and_more_employees') }}</option>
                                    </select>
                                @else
                                    <select name="answerBoolean" class="form-control">
                                        <option value=''>---</option>
                                        <option value='No' {{ $fraudAnswer->answer == 'No' ? 'selected' : '' }}>{{trans('select.no')}}</option>
                                        <option value='Yes' {{ $fraudAnswer->answer == 'Yes' ? 'selected' : '' }}>{{trans('select.yes')}}</option>
                                    </select>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    @endforeach

</div>
