<template>
    <section style="height: 100vh; display: flex; align-items: center; max-width: 500px; padding: 0 16px; margin: 0 auto;">
        <div class="container">
            <h1 class="kb-title">Добро пожаловать<strong style="display: block"> в безналичный город!</strong></h1>
            <div v-if="isNewUser" id="form-login" class="form">
                <input class="kb-input" v-model="phone" v-mask="['+7(###)###-##-##']" type="text" placeholder="+7(XXX)-XXX-XX-XX">
                <input class="kb-input" v-model="password" type="password" placeholder="Пароль">
                <span style="color: #1a202c; margin-bottom: 10px;">{{ massage }}</span>
                <button class="kb-button" @click="login">Войти</button>
                <div class="form-line"></div>
                <span class="kb-span" style="text-align: center">Или войти через</span>
                <button class="button-esia"></button>
            </div>

            <div v-else-if="!isNewUser" id="form-registration" class="form">
                <input class="kb-input" v-model="phone" v-mask="['+7(###)###-##-##']" type="text" placeholder="+7(XXX)-XXX-XX-XX">
                <input class="kb-input" v-model="password" type="password" placeholder="Пароль">
                <input class="kb-input" v-model="password2" type="password" placeholder="Подтвердите пароль">
                <span style="color: #1a202c; margin-bottom: 10px;">{{ massage }}</span>
                <button class="kb-button" @click="registration">Зарегистрироваться</button>
                <div class="form-line"></div>
                <span class="kb-span" style="text-align: center">Или войти через</span>
                <button class="button-esia"></button>
            </div>

            <div class="link-auth">
                <a  @click="isNewUser = !isNewUser" href="#">{{ isNewUser ? 'Зарегистрироваться' : 'Войти' }}</a>
            </div>
        </div>
    </section>
</template>

<script>
import {mask} from 'vue-the-mask';

export default {
    name: "Login",
    components: {

    },

    directives: {
        mask
    },

    data() {
        return {
            phone: '+7(999)000-13-13',
            password: '',
            password2: '',
            massage: '',
            isNewUser: true
        }
    },

    methods: {
        login(){
            console.log(this.phone)
            axios.get('/sanctum/csrf-cookie').then(responce => {
                axios.post(route('login'), {
                    'phone': this.phone,
                    'password': this.password,
                }).then(r => {
                    localStorage.setItem('x_xsrf_token', r.config.headers['X-XSRF-TOKEN']);
                    location.href = this.route('app.home')
                }).catch(reason => this.massage = reason.response.data.message);
            });
        },

        registration(){
            if (this.password !== this.password2){
                this.massage = 'Пароли не совпадают'
            }
            axios.get('/sanctum/csrf-cookie').then(responce => {
                axios.post(route('registration'), {
                    'phone': this.phone,
                    'password': this.password,
                    'password2': this.password2,
                }).then(r => {
                    localStorage.setItem('x_xsrf_token', r.config.headers['X-XSRF-TOKEN']);
                    location.href = this.route('index')
                }).catch(reason => this.massage = reason.response.data.message);
            });
        }
    }
}
</script>

<style lang="sass" scoped>
    .form
        display: flex
        flex-direction: column
        &-line
            width: 100%
            height: 40px
            border-bottom: 0.5px solid #D4D6DD
            margin-bottom: 16px
.button-esia
    border: none
.link-auth
    color: #006ffd
    font-style: italic
    font-family: sans-serif
    text-align: center
</style>
