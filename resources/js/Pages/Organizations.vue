<template>
    <div class="container">
        <h1>Создание новой организации</h1>
        <div class="form">
            <input class="kb-input" type="text" v-model="organisation_name" placeholder="Наименование">
            <input class="kb-input" type="text" v-model="address" placeholder="Адрес">
            <button class="kb-button" @click="createOrganisation">Создать</button>
            <span>{{ message }}</span>
        </div>

        <h1>Организации</h1>
        <table class="table">
            <thead>
                <tr><td>Наименование</td><td>Адрес</td></tr>
            </thead>

            <tbody>
                <tr v-for="organisation in $page.props.organisations">
                    <td><a style="color: #006FFD" :href="route('organisation', organisation.id)">{{ organisation.organisation_name }}</a></td><td>{{ organisation.address }}</td></tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name: "Organizations",

    props: {

    },

    data(){
        return {
            organisation_name: '',
            address: '',
            message: '',
        }
    },

    created() {
        console.log(this.$page.props.organisations)
    },

    methods: {
        createOrganisation(){
            axios.post(route('organisation.create'), {
                'organisation_name': this.organisation_name,
                'address': this.address,
            }).then(r => {
                this.massage = r.response.data.message
            }).catch(reason => this.massage = reason.response.data.message);
        }
    },
}
</script>

<style lang="sass" scoped>
.form
    display: flex
    flex-direction: column
    margin-bottom: 40px
</style>


<style>
.table {
    width: 100%;
    margin-bottom: 20px;
    border: 1px solid #dddddd;
    border-collapse: collapse;
}
.table th {
    font-weight: bold;
    padding: 5px;
    background: #efefef;
    border: 1px solid #dddddd;
}
.table td {
    border: 1px solid #dddddd;
    padding: 5px;
}
</style>
