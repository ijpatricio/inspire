import axios from 'axios'
axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'

const { data: template } = await axios.get('/remote-template')
console.log('Loading remote template')

// Or
//const template = `#taskList`

export default {
    template,
}
