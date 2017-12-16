Vue.config.devtools = true;

var vm = new Vue({
	el: '#UserController',

	data: {
		users: []
	},

	methods: {
		fetchUser: function () {
			this.$http.get('users').then(response => {
				this.users = response.body;
			});
		}
	},

	mounted: function () {
		this.fetchUser();
	}
});