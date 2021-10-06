const { dependencies } = require('@b.d/gulp-wp/tasks/build');

module.exports = {
	task: (gulp, {}, registry) => {

		return function build(done) {
			console.log('fake build');
			done();
		}
	},
	dependencies: [...dependencies, 'test'],
}
