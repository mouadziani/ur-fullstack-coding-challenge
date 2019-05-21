<template>
	<div>
		<div class="row">
			<div class="col-md-4">
				<shop v-for="shop of shops" :shop-item="shop" :preferred-shops="true" :key="shop.id"/>
			</div>
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
				axios.get(API_URL + '/shop/prefrred-shop') 
					.then(response => {
						this.hideLoading()
						this.shops = response.data.shops
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
			this.showLoading()
			this.getAll()
		}
	}
</script>