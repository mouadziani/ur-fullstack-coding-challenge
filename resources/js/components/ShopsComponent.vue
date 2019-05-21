<template>
	<div>
		<loader v-if="loading"/>
		<navbar-component/>
		<div class="container mt-5">
    		<router-view></router-view>
		</div>
	</div>
</template>

<script>
	export default {
		data() {
			return {
				loading: false
			}
		},
		methods: {
			showLoading() {
				this.loading = true
			},
			hideLoading() {
				this.loading = false
			}
		}
	}
</script>