<template>
    <AppHeaderDropdown right no-caret>
        <template slot="header">
        </template>\
        <template slot="dropdown">
            <b-dropdown-header tag="div" class="text-center"><strong>{{ __('Account') }}</strong></b-dropdown-header>
            <b-dropdown-item><i class="fa fa-bell-o" /> {{ __('Updates') }}
                <b-badge variant="info">{{ itemsCount }}</b-badge>
            </b-dropdown-item>
            <b-dropdown-item><i class="fa fa-envelope-o" /> {{ __('Messages') }}
                <b-badge variant="success">{{ itemsCount }}</b-badge>
            </b-dropdown-item>
            <b-dropdown-item><i class="fa fa-tasks" /> {{ __('Tasks') }}
                <b-badge variant="danger">{{ itemsCount }}</b-badge>
            </b-dropdown-item>
            <b-dropdown-item><i class="fa fa-comments" /> {{ __('Comments') }}
                <b-badge variant="warning">{{ itemsCount }}</b-badge>
            </b-dropdown-item>
            <b-dropdown-header tag="div" class="text-center">
                <strong>{{ __('Settings') }}</strong>
            </b-dropdown-header>
            <b-dropdown-item><i class="fa fa-user" /> {{ __('Profile') }}</b-dropdown-item>
            <b-dropdown-item><i class="fa fa-wrench" /> {{ __('Settings') }}</b-dropdown-item>
            <b-dropdown-item><i class="fa fa-usd" /> {{ __('Payments') }}
                <b-badge variant="secondary">{{ itemsCount }}</b-badge>
            </b-dropdown-item>
            <b-dropdown-item><i class="fa fa-file" /> {{ __('Projects') }}
                <b-badge variant="primary">{{ itemsCount }}</b-badge>
            </b-dropdown-item>
            <b-dropdown-divider />
            <b-dropdown-item><i class="fa fa-shield" /> {{ __('Lock Account') }}</b-dropdown-item>
            <b-dropdown-item><i class="fa fa-lock" /> {{ __('Logout') }}</b-dropdown-item>
        </template>
    </AppHeaderDropdown>
</template>

<script>
    import { HeaderDropdown as AppHeaderDropdown } from '@coreui/vue'
    export default {
        name: 'DefaultHeaderDropdownAccnt',
        components: {
            AppHeaderDropdown
        },
        data: () => {
            return { itemsCount: 42 }
        }
    }
</script>
