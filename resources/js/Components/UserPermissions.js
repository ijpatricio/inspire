import { Button, Card, DropdownMenu, DropdownOption } from '@flavorly/vanilla-components'
import axios from 'axios'
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

const { data: template } = await axios.post('/api/component', {
    name: 'UserPermissions',
})

export default {
    template,

    methods: {
        hello(msg) {
            console.log('hello', msg)
        },
    },
}
