<template>
	<div class="card">
		<div class="card-header">
			{{ shop.name }}
			<span class="float-right">
				<strong>{{ shop.likes }}</strong> Likes -
				<strong>{{ shop.dislikes }}</strong> Dislikes
			</span>
		</div>
		<div class="card-body">
			<img :src="shop.image" class="card-img-top shop-image">
		</div>
		<div class="card-footer">
			<span v-if="!preferredShops">
				<button @click="dislike()" :disabled="!shop.liked" class="btn btn-sm float-left btn-danger">Dislike</button>
				<button @click="like()" :disabled="shop.liked" class="btn btn-sm float-right btn-success">Like</button>
			</span>
			<span v-else>
				<button @click="removePreferred()" class="btn btn-sm float-left btn-danger">Remove</button>
			</span>
		</div>
	</div>
</template>

<script>
	import { API_URL } from './../../utils/constants'

	export default {
		props: ['shopItem', 'preferredShops'],
		data() {
			return {
		        shop: this.shopItem,
				isLikeAction: true
			}
		},
		methods: {
			like() {
				if(!this.shop.liked) {
					this.isLikeAction = true
					this.likeOrDislike(this.shop.id)
				}
			},
			dislike() {
				if(this.shop.liked) {
					this.isLikeAction = false
					this.likeOrDislike(this.shop.id)
				}
			},
			likeOrDislike() {
				let actionUrl = (this.isLikeAction) ? 'like' : 'dislike'

				axios.put(`${API_URL}/shop/${actionUrl}/${this.shop.id}`)
					.then(response => {
						if(response.status == 201){
							this.shop = response.data.shop
						}
					})
					.catch(error => {
						console.log(error)
					})
			},
			removePreferred() {
				axios.delete(`${API_URL}/shop/prefrred-shop/${this.shop.id}/remove`)
					.then(response => {
						if(response.status == 201) {
							this.$parent.getAll()
							// _.filter(this.$parent.shops, function(item) {
							//     return item.id !== this.shop.id;
							// })
						}
					})
					.catch(error => {
						console.log(error)
					})
			}
		}
	}
</script>

<style scoped>
	.shop-image {
		height: 200px;
	}
</style>