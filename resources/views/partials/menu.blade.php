<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/workspaces*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('workspace_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.workspaces.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/workspaces") || request()->is("admin/workspaces/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.workspace.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('form_setting_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/capitals*") ? "c-show" : "" }} {{ request()->is("admin/macroprocesses*") ? "c-show" : "" }} {{ request()->is("admin/statuses*") ? "c-show" : "" }} {{ request()->is("admin/cadences*") ? "c-show" : "" }} {{ request()->is("admin/impacts*") ? "c-show" : "" }} {{ request()->is("admin/probabilities*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.formSetting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('capital_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.capitals.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/capitals") || request()->is("admin/capitals/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.capital.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('macroprocess_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.macroprocesses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/macroprocesses") || request()->is("admin/macroprocesses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.macroprocess.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/statuses") || request()->is("admin/statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.status.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('cadence_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.cadences.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/cadences") || request()->is("admin/cadences/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.cadence.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('impact_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.impacts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/impacts") || request()->is("admin/impacts/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.impact.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('probability_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.probabilities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/probabilities") || request()->is("admin/probabilities/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-list c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.probability.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('manage_control_key_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/control-keys*") ? "c-show" : "" }} {{ request()->is("admin/sections*") ? "c-show" : "" }} {{ request()->is("admin/risks*") ? "c-show" : "" }} {{ request()->is("admin/questions*") ? "c-show" : "" }} {{ request()->is("admin/activities*") ? "c-show" : "" }} {{ request()->is("admin/question-answers*") ? "c-show" : "" }} {{ request()->is("admin/period-answers*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.manageControlKey.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('control_key_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.control-keys.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/control-keys") || request()->is("admin/control-keys/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-key c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.controlKey.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('section_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.sections.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/sections") || request()->is("admin/sections/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-puzzle-piece c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.section.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('risk_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.risks.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/risks") || request()->is("admin/risks/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.risk.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('question_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.questions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/questions") || request()->is("admin/questions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.question.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('activity_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.activities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/activities") || request()->is("admin/activities/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.activity.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('question_answer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.question-answers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/question-answers") || request()->is("admin/question-answers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.questionAnswer.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('period_answer_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.period-answers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/period-answers") || request()->is("admin/period-answers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.periodAnswer.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('manage_protocol_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/protocols*") ? "c-show" : "" }} {{ request()->is("admin/protocol-table-questions*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.manageProtocol.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('protocol_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.protocols.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/protocols") || request()->is("admin/protocols/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.protocol.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('protocol_table_question_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.protocol-table-questions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/protocol-table-questions") || request()->is("admin/protocol-table-questions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.protocolTableQuestion.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('fraud_answer_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.fraud-answers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/fraud-answers") || request()->is("admin/fraud-answers/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.fraudAnswer.title') }}
                </a>
            </li>
        @endcan
        @can('fraud_question_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.fraud-questions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/fraud-questions") || request()->is("admin/fraud-questions/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.fraudQuestion.title') }}
                </a>
            </li>
        @endcan
        @can('risk_map_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.risk-maps.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/risk-maps") || request()->is("admin/risk-maps/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.riskMap.title') }}
                </a>
            </li>
        @endcan
        @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
            @can('profile_password_edit')
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                        <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                        </i>
                        {{ trans('global.change_password') }}
                    </a>
                </li>
            @endcan
        @endif
        <li class="c-sidebar-nav-item">
            <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                </i>
                {{ trans('global.logout') }}
            </a>
        </li>
    </ul>

</div>