<template>
    <slot v-bind="{ name, changeName }">
        <div >
            Fooo aaa
        </div>
    </slot>
</template>

<script>
export default {

    data: () => ({
        name: 'Igerslike',
    }),

    methods: {
        hello(msg) {
            console.log('hello', msg)
        },
        changeName(newName) {
            this.name = newName
        },
    },

    render() {
        return this.$scopedSlots.default({
            name: this.name,
            changeName: this.changeName,
        })
    },
}
</script>
