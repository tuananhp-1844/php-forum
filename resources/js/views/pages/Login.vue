<template>
    <div class="app flex-row align-items-center">
        <div class="container">
            <b-row class="justify-content-center">
                <b-col md="8">
                    <b-card-group>
                        <b-card no-body class="p-4">
                            <b-card-body>
                                <b-form>
                                    <h1>{{ $t('Login') }}</h1>
                                    <p class="text-muted">{{ $t('Sign In to your account') }}</p>
                                    <b-input-group class="mb-3">
                                        <b-input-group-prepend>
                                            <b-input-group-text><i class="icon-user"></i></b-input-group-text>
                                        </b-input-group-prepend>
                                        <b-form-input type="email" class="form-control" placeholder="Username" autocomplete="username email" v-model="email"/>
                                    </b-input-group>
                                    <b-input-group class="mb-4">
                                        <b-input-group-prepend>
                                            <b-input-group-text><i class="icon-lock"></i></b-input-group-text>
                                        </b-input-group-prepend>
                                        <b-form-input type="password" class="form-control" placeholder="Password" autocomplete="current-password" v-model="password"/>
                                    </b-input-group>
                                    <b-row>
                                        <b-col cols="6">
                                            <b-button variant="primary" class="px-4" @click='login()'>{{ $t('Login') }}
                                            </b-button>
                                        </b-col>
                                        <b-col cols="6" class="text-right">
                                            <b-button variant="link" class="px-0">{{ $t('Forgot password?') }}
                                            </b-button>
                                        </b-col>
                                    </b-row>
                                </b-form>
                            </b-card-body>
                        </b-card>
                        <b-card no-body class="text-white bg-primary py-5 d-md-down-none" style="width:44%">
                            <b-card-body class="text-center">
                                <div>
                                    <h2>{{ $t('Sign up') }}</h2>
                                    <p>{{ $t('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.') }}
                                    </p>
                                    <b-button variant="primary" class="active mt-3">{{ $t('Register Now!') }}</b-button>
                                </div>
                            </b-card-body>
                        </b-card>
                    </b-card-group>
                </b-col>
            </b-row>
        </div>
    </div>
</template>

<script>
    import { login } from '@/service/auth';
    import { setToken } from '@/helper/local-storage'

    export default {
        name: 'Login',
        data: () => {
            return {
                email: '',
                password: ''
            }
        },
        methods: {
            login() {
                login(this.email, this.password).then(res => {
                    console.log(res)
                    setToken(res.access_token)
                    this.$router.push('/')
                }).catch(err => {
                    
                })
            }
        }
    }
</script>
