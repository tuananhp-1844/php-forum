<template>
    <AppHeaderDropdown right no-caret>
        <template slot="header">
            <img :src="profile.avatar" class="img-avatar" :alt="profile.email" />
        </template>\
        <template slot="dropdown">
            <b-dropdown-header tag="div" class="text-center"><strong>{{ profile.fullname }}</strong></b-dropdown-header>
            <b-dropdown-item><i class="fa fa-bell-o" /> {{ $t('Updates') }}
                <b-badge variant="info">{{ itemsCount }}</b-badge>
            </b-dropdown-item>
            <b-dropdown-item><i class="fa fa-envelope-o" /> {{ $t('Messages') }}
                <b-badge variant="success">{{ itemsCount }}</b-badge>
            </b-dropdown-item>
            <b-dropdown-item><i class="fa fa-tasks" /> {{ $t('Tasks') }}
                <b-badge variant="danger">{{ itemsCount }}</b-badge>
            </b-dropdown-item>
            <b-dropdown-item><i class="fa fa-comments" /> {{ $t('Comments') }}
                <b-badge variant="warning">{{ itemsCount }}</b-badge>
            </b-dropdown-item>
            <b-dropdown-header tag="div" class="text-center">
                <strong>{{ $t('Settings') }}</strong>
            </b-dropdown-header>
            <b-dropdown-item><i class="fa fa-user" /> {{ $t('Profile') }}</b-dropdown-item>
            <b-dropdown-item><i class="fa fa-wrench" /> {{ $t('Settings') }}</b-dropdown-item>
            <b-dropdown-item><i class="fa fa-usd" /> {{ $t('Payments') }}
                <b-badge variant="secondary">{{ itemsCount }}</b-badge>
            </b-dropdown-item>
            <b-dropdown-item><i class="fa fa-file" /> {{ $t('Projects') }}
                <b-badge variant="primary">{{ itemsCount }}</b-badge>
            </b-dropdown-item>
            <b-dropdown-divider />
            <b-dropdown-item><i class="fa fa-shield" /> {{ $t('Lock Account') }}</b-dropdown-item>
            <b-dropdown-item @click="logout()"><i class="fa fa-lock" /> {{ $t('Logout') }}</b-dropdown-item>
        </template>
    </AppHeaderDropdown>
</template>

<script>
    import { logout } from '@/service/auth';
    import { clearLocalStorage } from '@/helper/local-storage'
    import { HeaderDropdown as AppHeaderDropdown } from '@coreui/vue'
    import router from '@/router'

    export default {
        name: 'DefaultHeaderDropdownAccnt',
        components: {
            AppHeaderDropdown
        },
        data: () => {
            return { itemsCount: 42 }
        },
        props: [
            'profile'
        ],
        methods: {
            logout() {
                logout().then(res => {
                    clearLocalStorage()
                    router.push('/login')
                }).catch(err => {

                })
            }
        }
    }
</script>
