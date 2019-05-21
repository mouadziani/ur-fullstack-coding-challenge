<template>
	<div>
		<div class="row">
			<shop class="col-md-4 mb-2" v-for="shop of shops" :shop-item="shop" :preferred-shops="false" :key="shop.id"/>
		</div>
	</div>
</template>
<script>
	import Shop from './../shared/ShopComponent.vue'
	import { API_URL } from './../../utils/constants'

	export default {
		data() {
			return {
				shops: [],
			}	
		},
		components: {
			'shop': Shop
		},
		methods: {
			getAll() {
				this.showLoading()
				axios.get(API_URL + '/shop')
					.then(response => {
						this.shops = response.data.shops
						this.hideLoading()
					})
					.catch(error => {
						this.hideLoading()
						console.log(error)
					})
			},
			showLoading() {
				this.$parent.showLoading()
			},
			hideLoading() {
				this.$parent.hideLoading()
			}
		},
		mounted() {
			this.getAll()
		}
	}
</script>