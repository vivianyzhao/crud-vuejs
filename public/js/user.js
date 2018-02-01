Vue.config.devtools = true;
Vue.http.options.root = '/';
Vue.http.headers.common['X-CSRF-TOKEN'] = document.getElementById('csrf-token').getAttribute('content');


// Try to user axios instead of Vue-resource
var emailRgx = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
var vm = new Vue({
 // http: {
 //    	root: '/root',
 //    	headers: {
 //             'X-CSRF-TOKEN': document.getElementById('csrf-token').getAttribute('content')
 //        }
 //    },

	el: '#UserController',

	data: {
		newUser: {
			id: null,
			name: 'Test User',
			email: 'example@email.com',
			phone: '123-456-0000'
		},
		users: [],
		edit: false,
		success: false
	},

	methods: {
		fetchUser: function () {
			this.$http.get('users').then(response => {
				this.users = response.body;
			});
		},

		addNewUser: function () {
			var user = this.newUser;
			this.$http.post('users', user).then(response => {
				this.updateSuccess();
			});
		}, 

		showUser: function (id) {
			this.$http.get('users/' + id).then(response => {
				var data = response.body;
				this.newUser.id = data.id;
				this.newUser.name = data.name;
				this.newUser.email = data.email;
				this.newUser.address = data.address;
				this.newUser.phone = data.phone;
				this.edit = true;
			});
		}, 

		editUser: function (id) {
			var user = this.newUser;
			this.$http.patch('users/' + id, user).then(response => {
				this.edit = false;
				this.updateSuccess();
			});
		},

		deleteUser: function (id) {
			if (!confirm('Are you sure you want to delete this user?')) {
				return;
			}
			
			this.$http.delete('users/' + id).then(response => {
				this.updateSuccess();
			});
		},

		updateSuccess: function () {
			this.success = true;
			self = this;
			setTimeout(() => {
				self.success = false;
			}, 3000);
			this.fetchUser();
		}
	},

	computed: {
		validation: function () {
			return {
				name: !!this.newUser.name.trim(),
				email: emailRgx.test(this.newUser.email)
			}
		},

		isValid: function () {
			var validation = this.validation;
			return Object.keys(validation).every(function (key) {
				return validation[key]
			})
		}
	},

	mounted: function () {
		this.fetchUser();
	}
});