<template>
    <div class="container">
        <h1>Организация: <span>{{ $page.props.organisation.organisation_name }}</span></h1>
        {{ $page.props.organisation }}
        <form action="post">
            <input type="text" name="organisation_name" id="organisation_name">
            <input type="text" name="address" id="address">
            <textarea name="description" id="description"></textarea>
            <input type="submit" value="Изменить организацию">
        </form>
    </div>
</template>

<script>
export default {
    name: "Organisation"
}
</script>

<style scoped>

</style>
