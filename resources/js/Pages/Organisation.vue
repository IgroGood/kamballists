<template>
    <div class="container">
        <h1>Организация: <span>{{ $page.props.organisation.organisation_name }}</span></h1>
{{$page.props.organisation}}
    </div>
</template>

<script>
export default {
    name: "Organisation"
}
</script>

<style scoped>

</style>
