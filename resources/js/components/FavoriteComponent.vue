<template>
    <span>
        <a href="#" v-if="isFavorited" @click.prevent="unFavorite(company)">
            <i class="bi bi-bookmark-fill" style="font-size: 1.5em;"></i>
        </a>
        <a href="#" v-else @click.prevent="favorite(company)">
           <i class="bi bi-bookmark" style="font-size: 1.5em;"></i>
        </a>
    </span>
</template>

<script>
    export default {
        name: 'favorite',
        props: ['company', 'favorited'],

        data: function() {
            return {
                isFavorited: '',
            }
        },

        mounted() {
            this.isFavorited = this.isFavorite ? true : false;
        },

        computed: {
            isFavorite() {
                return this.favorited;
            },
        },
        
        methods: {
            favorite(company) {
                axios.post('/favorite/'+company)
                    .then(response => this.isFavorited = true)
                    .catch(response => console.log(response.data));
            },

            unFavorite(company) {
                axios.post('/unfavorite/'+company)
                    .then(response => this.isFavorited = false)
                    .catch(response => console.log(response.data));
            }
        }
    }
</script>