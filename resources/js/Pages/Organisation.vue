<template>
    <div class="container">
        <h1>Организация: <span>{{ $page.props.organisation.organisation_name }}</span></h1>
        {{ $page.props.organisation }}
        <div class="form">
            <input class="kb-input" type="text" name="organisation_name" v-model="organisation_name">
            <input class="kb-input" type="text" name="address" v-model="address">
            <textarea class="kb-input" name="description" v-model="description"></textarea>
            <input class="kb-button" @click="edit" type="submit" value="Изменить организацию">
        </div>
    </div>
</template>

<script>
export default {
    name: "Organisation",

    data(){
        return {
            organisation_name: this.$page.props.organisation_name,
            address: this.$page.props.address,
            description: this.$page.props.description,
            latitude: this.$page.props.latitude,
            longitude: this.$page.props.longitude,
        }
    },

    methods: {
        edit(){
            axios.post(route('organisation.edit'), {
                'organisation_name': this.organisation_name,
                'address': this.address,
                'description': this.description,
                'latitude': this.latitude,
                'longitude': this.longitude,
            }).then(r => {
                console.log(r)
            }).catch(reason => console.log(reason.response));
        }
    }
}
</script>

<style lang="sass" scoped>
.form
    display: flex
    flex-direction: column
</style>
